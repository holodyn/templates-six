<?php

# Logo
  if (file_exists(ROOTDIR.'/assets/img/logo.png'))
    $pdf->Image(ROOTDIR.'/assets/img/logo.png', 20, 25, 75);
  elseif (file_exists(ROOTDIR.'/assets/img/logo.jpg'))
    $pdf->Image(ROOTDIR.'/assets/img/logo.jpg', 20, 25, 75);
  else
    $pdf->Image(ROOTDIR.'/assets/img/placeholder.png', 20, 25, 75);

# Company Details
  $pdf->SetFont($pdfFont,'',13);
  $pdf->Cell(0,4,trim($companyaddress[0]),0,1,'R');
  $pdf->SetFont($pdfFont,'',9);
  for ( $i = 1; $i <= ((count($companyaddress)>6) ? count($companyaddress) : 6); $i += 1) {
    $pdf->Cell(0,4,trim($companyaddress[$i]),0,1,'R');
  }
  $pdf->Ln(0);

# Introduction
  ob_start();
  ?>
  <table width="100%">
    <tr>
      <td><p><?php
        if ($clientsdetails["companyname"]) {
          echo '<b>'.$clientsdetails["companyname"].'</b><br>';
          echo $_LANG["invoicesattn"].": ".$clientsdetails["firstname"]." ".$clientsdetails["lastname"].'<br>';
        }
        else {
          echo '<b>'.$clientsdetails["firstname"]." ".$clientsdetails["lastname"].'</b><br>';
        }
        echo $clientsdetails["address1"].'<br>';
        if ($clientsdetails["address2"]) {
          echo $clientsdetails["address2"].'<br>';
        }
        echo $clientsdetails["city"].', '.$clientsdetails["state"].', '.$clientsdetails["postcode"].'<br>';
        echo $clientsdetails["country"].'<br>';
      ?></p></td>
      <td align="right"><p><?php
        echo '<b>'. $_LANG['quotenumber'] .':</b> '. $quotenumber . '<br>';
        switch ($stage) {
          case 'Accepted':
            echo '<font color="green"><b>'. $_LANG['quotestage'] .':</b> '. $stage . '</font><br>';
            break;
          case 'Lost':
          case 'Dead':
            echo '<font color="red"><b>'. $_LANG['quotestage'] .':</b> '. $stage . '</font><br>';
            break;
          default:
            # code...
            break;
        }
        echo '<b>'. $_LANG['quotesubject'] .':</b> '. $subject . '<br>';
        echo '<b>'. $_LANG['quotedatecreated'] .':</b> '. $datecreated . '<br>';
        echo '<b>'. $_LANG['quotevaliduntil'] .':</b> '. $validuntil . '<br>';
      ?></p></td>
    </tr>
  </table>
  <?php
  $html = ob_get_clean();
  $pdf->SetFont($pdfFont,'',10);
  $pdf->writeHTML($html, true, false, false, false, '');

# Introduction
  ob_start();
  ?>
  <p>Holodyn of Atlanta brings more than 30 years of combined experience in UX/UI, data solutions, internet marketing, and growth management to the table.  Our team specializes in delivering tailored services that recognize the unique needs of each client, leveraging decades of solutions, modern standards and market offerings to keep your costs low and reduce timelines without compromising on quality.  With Holodyn you'll always have a partner a simple phone call away.</p>
  <p>We appreciate the opportunity to bid on your project and look forward to collaborating with you.</p>
  <?php
  $html = ob_get_clean();
  $pdf->SetFont($pdfFont,'',9);
  $pdf->writeHTML($html, true, false, false, false, '');
  $pdf->Ln(4);

# Proposal
  if ($proposal) {
    ob_start();
    ?>
    <h3>Proposal Objective(s)</h3>
    <p><?php echo str_replace("\n", "<br>", $proposal) ?></p>
    <?php
    $html = ob_get_clean();
    $pdf->SetFont($pdfFont,'',9);
    $pdf->writeHTML($html, true, false, false, false, '');
    $pdf->Ln(4);
  }

# Quote Line Items
    $pdf->SetDrawColor(200);
    $pdf->SetFillColor(239);
    $pdf->SetFont($pdfFont,'',8);
    $tblhtml = '<table width="100%" bgcolor="#ccc" cellspacing="1" cellpadding="2" border="0">
        <tr height="30" bgcolor="#efefef" style="font-weight:bold;text-align:center;">
            <td width="5%">'.$_LANG['quoteqty'].'</td>
            <td width="45%">'.$_LANG['quotedesc'].'</td>
            <td width="15%">'.$_LANG['quoteunitprice'].'</td>
            <td width="15%">'.$_LANG['quotediscount'].'</td>
            <td width="20%">'.$_LANG['quotelinetotal'].'</td>
        </tr>';
    foreach ($lineitems AS $item) {
        $tblhtml .= '
        <tr bgcolor="#fff">
            <td align="center">'.$item['qty'].'</td>
            <td align="left">'.nl2br($item['description']).'<br /></td>
            <td align="center">'.$item['unitprice'].'</td>
            <td align="center">'.$item['discount'].'</td>
            <td align="center">'.$item['total'].'</td>
        </tr>';
    }
    $tblhtml .= '
        <tr height="30" bgcolor="#efefef" style="font-weight:bold;">
            <td align="right" colspan="4">'.$_LANG['invoicessubtotal'].'</td>
            <td align="center">'.$subtotal.'</td>
        </tr>';
    if ($taxlevel1['rate']>0) $tblhtml .= '
        <tr height="30" bgcolor="#efefef" style="font-weight:bold;">
            <td align="right" colspan="4">'.$taxlevel1['name'].' @ '.$taxlevel1['rate'].'%</td>
            <td align="center">'.$tax1.'</td>
        </tr>';
    if ($taxlevel2['rate']>0) $tblhtml .= '
        <tr height="30" bgcolor="#efefef" style="font-weight:bold;">
            <td align="right" colspan="4">'.$taxlevel2['name'].' @ '.$taxlevel2['rate'].'%</td>
            <td align="center">'.$tax2.'</td>
        </tr>';
    $tblhtml .= '
        <tr height="30" bgcolor="#efefef" style="font-weight:bold;">
            <td align="right" colspan="4">'.$_LANG['invoicestotal'].'</td>
            <td align="center">'.$total.'</td>
        </tr>
    </table>';
    $pdf->SetFont($pdfFont,'',9);
    $pdf->writeHTML($tblhtml, true, false, false, false, '');

# Notes
    if ($notes) {
      # Introduction
        ob_start();
        ?>
        <h3>Additional Notes / Project Details</h3>
        <p><?php echo str_replace("\n", "<br>", $notes) ?></p>
        <?php
        $html = ob_get_clean();

      # Push to Page
        $pdf->SetFont($pdfFont,'',9);
        $pdf->writeHTML($html, true, false, false, false, '');
    }

# Introduction
  ob_start();
  ?>
  <h3>Terms and Conditions</h3>
  <p>Please review the Terms and Conditions that will apply to this project at <a href="https://holodyn.com/awd/terms-conditions">https://holodyn.com/awd/terms-conditions</a>.</p>
  <?php
  $html = ob_get_clean();
  $pdf->SetFont($pdfFont,'',9);
  $pdf->writeHTML($html, true, false, false, false, '');
  $pdf->Ln(4);

