
                </div><!-- /.main-content -->
                {if !$inShoppingCart && $secondarySidebar->hasChildren()}
                    <div class="col-md-3 pull-md-left sidebar sidebar-secondary">
                        {include file="$template/includes/sidebar.tpl" sidebar=$secondarySidebar}
                    </div>
                {/if}
            <div class="clearfix"></div>
        </div>
    </div>
</section>

<section id="footer">

    <div class="row footerbar">
        <div class="col-sm-12 col-md-8">
            <div class="copyright">
                <div>
                    <a href=https://billing.holodyn.com/submitticket.php>
                        Submit a Ticket
                    </a> |
                    <a href=https://bamf.holodyn.net/cpanel>
                        Manage Account
                    </a> |
                    <a href="affiliates.php">
                        {$LANG.affiliatestitle}
                    </a> |
                    <a href="http://holodyn.com/web/refund-amp-privacy-policy.html" target="_blank" title="Atlanta Website Marketing, Development, Design and Support | Refund &amp; Privacy Policy">
                        Privacy Policy
                    </a> |
                    <a href="http://holodyn.com/web/refund-policy.html" target="_blank" title="Atlanta Website Marketing, Development, Design and Support | Refund Policy">
                        Refund Policy
                    </a> |
                    <a href="http://holodyn.com/web/terms-of-service.html" target="_blank" title="Atlanta Website Marketing, Development, Design and Support | Terms of Service">
                        Terms of Service
                    </a>
                </div>
                <div class="affiliate_links">
                    <a href=http://atlanta-websites.com/>Atlanta Website Templates</a>
                    | <a href=http://www.liquidsquidstudios.com>Atlanta Graphic Design</a>
                    | <a href=http://www.webuddha.com/>Atlanta Web Design</a>
                    | <a href=http://www.holodyn.com/hosting>Atlanta Web Hosting</a>
                </div>
                <div>
                    Copyright &copy; 2006 - {$smarty.now|date_format:"%Y"} :: <strong>{$companyname}</strong> :: All Rights Reserved Worldwide
                </div>
                <div>
                    <br><br>
                    <a class="brand liquid" href="http://www.liquidsquidstudios.com"><img src="templates/{$template}/img/brand-liquidsquid.png" alt="Atlanta Graphic Design | Liquid Squid Studios" /></a>
                    <a class="brand webuddha" href="http://www.webuddha.com"><img src="templates/{$template}/img/brand-webuddha.png" alt="Atlanta Internet Marketing | Webuddha.com" /></a>
                    <br><br>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-2">
            <div class="AuthorizeNetSeal">
              <script type="text/javascript" language="javascript">var ANS_customer_id="41d2ca09-29c6-4c12-9da3-1a5b1f8615e8";</script>
              <script type="text/javascript" language="javascript" src="//VERIFY.AUTHORIZE.NET/anetseal/seal.js" ></script>
              <a href="http://www.authorize.net/" id="AuthorizeNetText" target="_blank">Credit Card Processing</a>
            </div>
            <span id="siteseal">
              <script type="text/javascript" src="https://seal.starfieldtech.com/getSeal?sealID=60749652904613b1a4127119a6f7868c17dfd06353432426611003041"></script>
            </span>
        </div>
        <div class="col-xs-6 col-md-2">
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="8ZUJJQVX6NR34">
            <input type="image" src="https://www.paypalobjects.com/WEBSCR-640-20110429-1/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" style="width:auto;height:auto;">
            <img alt="" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110429-1/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
        </div>
    </div>

</section>

<div class="modal system-modal fade" id="modalAjax" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-primary">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Title</h4>
            </div>
            <div class="modal-body panel-body">
                Loading...
            </div>
            <div class="modal-footer panel-footer">
                <div class="pull-left loader">
                    <i class="fas fa-circle-notch fa-spin"></i> Loading...
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary modal-submit">
                    Submit
                </button>
            </div>
        </div>
    </div>
</div>

{$footeroutput}

</body>
</html>
