<?php

/**

  Webuddha wbTeamPro
  (c)2010 Webuddha.com, The Holodyn Corporation - All Rights Reserved

  CHANGELOG ************

**/

/*************************** Valid Request */
  (defined('WBTEAMPRO_VALID') && defined('WHMCS_CLIENT')) or die('wbTeamPro Error: Invalid Access');

// Override Page Title
  wbTeamPro_html::setPageTitle( $openProject->project_name );

/*************************** Render */
  ?>
  <h3><?php echo wbTeamPro_html::safeText($openProject->project_name) ?>
    <a class="btn btn-sm btn-default pull-right" href="wbteampro.php?task=dashboard" title="<?php echo wbTeamPro_lang::_('formnav.close'); ?>"><?php echo wbTeamPro_lang::_('formnav.close'); ?></a></h3>
  <div id="activerecordinfo">
    <input type="hidden" name="project_id" value="<?php echo $openProject->project_id ?>" />
    <input type="hidden" name="client_userid" value="<?php echo $openProject->client_userid ?>" />
  </div>
  <div id="tabs">
    <ul class="nav nav-tabs">
      <?php
        foreach($pageTabs AS $k => $v){
          $tabTask = is_array($v) ? $v['task'] : $k;
          if( is_array($v) )
            echo '<li class="'. ($activeTab == $k ? 'active' : '').(isset($v['css'])?' '.$v['css']:'') .'"><a href="'.$v['link'].'"  title="'.$v['label'].'">'. $v['label'] .'</a></li>';
          else if( $tabTask == 'project.file.edit' )
            echo '<li class="'. ($activeTab == $k ? 'active' : '') .'"><a href="wbteampro.php?task='. $k .'&file_id='. $openThreadFile->file_id .'&project_id='. $openProject->project_id .'">'. $v .'</a></li>';
          else if( $tabTask == 'project.topic.edit' )
            echo '<li class="'. ($activeTab == $k ? 'active' : '') .'"><a href="wbteampro.php?task='. $k .'&topic_id='. $openThreadTopic->topic_id .'&project_id='. $openProject->project_id .'">'. $v .'</a></li>';
          else if( $tabTask == 'project.action.list' )
            echo '<li class="'. ($activeTab == $k ? 'active' : '') .' minisubs"><div>'
               . '<a href="wbteampro.php?task='. $tabTask .'&project_id='. $openProject->project_id.'" title="'.$v.' Tree View">'. $v .'</a>'
               . '<a class="sbtn tree'.(wbTeamPro_Request::get('list_mode','tree')=='tree'?' sel':'').'" href="wbteampro.php?task=project.action.list&project_id='. $openProject->project_id.'&list_mode=tree" title="Tree View">&nbsp;</a>'
               . '<a class="sbtn list'.(wbTeamPro_Request::get('list_mode','tree')=='list'?' sel':'').'" href="wbteampro.php?task=project.action.list&project_id='. $openProject->project_id.'&list_mode=list" title="List View">&nbsp;</a>'
               . '<a class="sbtn gantt'.(wbTeamPro_Request::get('list_mode','tree')=='gantt'?' sel':'').'" href="wbteampro.php?task=project.action.list&project_id='. $openProject->project_id.'&list_mode=gantt" title="Gantt View">&nbsp;</a>'
               . '</div></li>';
          else
            echo '<li class="'. ($activeTab == $k ? 'active' : '') .'"><a href="wbteampro.php?task='. $k .'&project_id='. $openProject->project_id .'">'. $v .'</a></li>';
        }
      ?>
    </ul>
  </div>
