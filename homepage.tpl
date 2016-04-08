<div class="row">
    <div class="col-xs-12 col-md-6">

        <div class="home-left-cta welcome-holodyn">
            <div>
                <div class="fa fa-globe"></div>
                <h2>A Focused Approach</h2>
                <p>Hailing from Atlanta, Georgia we are a focused team of web and software professionals that have delivered targeted products to the industry for over a decade.</p>
            </div>
        </div>

        <div class="home-left-cta welcome-solutions">
            <div>
                <h2>Practical Business Solutions</h2>
                <p>Specializing in practical solutions for platforms like WHMCS, Wordpress, Joomla, and Drupal.  Our software packages, integration api's, and commerce platforms drive critical businesses processes around the globe.</p>
            </div>
        </div>

        <div class="home-left-cta testimonials">
            <div>
                <h2>Testimonials</h2>
                <ul>
                    <li>
                        <div class="fa fa-quote-left"></div>
                        <p>Lightning fast response and quick easy resolve! Thanks for the great support and keeping current on WHMCS with this amazing product!</p>
                        <em>- K.W.</em>
                    </li>
                    <li>
                        <div class="fa fa-quote-left"></div>
                        <p>wbTeamPro is the best WHMCS and Project management module that I have ever seen. They have thought all the aspects on how to manage the project realistically. I continue to be impressed with the responsiveness of their support team.</p>
                        <em>- C.K.</em>
                    </li>
                    <li>
                        <div class="fa fa-quote-left"></div>
                        <p>I appreciate you taking the time to help. All developers are not so helpful. I really like this module because it does JUST what I need.</p>
                        <em>- L.C.</em>
                    </li>
                    <li>
                        <div class="fa fa-quote-left"></div>
                        <p>I love it. You have done a great job and I am happy that I can finally replace [the previous] with your product. I have spent months upon months looking for a replacement as well as streamlining with WHMCS which is very important for our team.</p>
                        <em>- M.W.</em>
                    </li>
                    <li>
                        <div class="fa fa-quote-left"></div>
                        <p>I just wanted to say what awesome support. We deal with quite a few partners and I would have to say Holodyn has some of the most responsive and willing support we have experienced. Many thanks for all your help :-)</p>
                        <em>- S.D.</em>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <div class="col-xs-12 col-md-6">

        <div class="home-right announcement-feed">
            <h2>{$LANG.news}</h2>
            {foreach $announcements as $announcement}
                {if $announcement@index < 2}
                    <div class="announcement-single">
                        <h3>
                            <a href="{if $seofriendlyurls}{$WEB_ROOT}/announcements/{$announcement.id}/{$announcement.urlfriendlytitle}.html{else}announcements.php?id={$announcement.id}{/if}">{$announcement.title}</a>
                            <span class="label label-default">
                                {$announcement.rawDate|date_format:"M jS"}
                            </span>
                        </h3>

                        <blockquote>
                            <p>
                                {if $announcement.text|strip_tags|strlen < 350}
                                    {$announcement.text}
                                {else}
                                    {$announcement.summary}
                                    <a href="{if $seofriendlyurls}{$WEB_ROOT}/announcements/{$announcement.id}/{$announcement.urlfriendlytitle}.html{else}announcements.php?id={$announcement.id}{/if}" class="label label-warning">{$LANG.readmore} &raquo;</a>
                                {/if}
                            </p>
                        </blockquote>

                        {if $announcementsFbRecommend}
                            <script>
                                (function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) {
                                        return;
                                    }
                                    js = d.createElement(s); js.id = id;
                                    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));
                            </script>
                            <div class="fb-like hidden-sm hidden-xs" data-layout="standard" data-href="{$systemurl}{if $seofriendlyurls}{$WEB_ROOT}/announcements/{$announcement.id}/{$announcement.urlfriendlytitle}.html{else}announcements.php?id={$announcement.id}{/if}" data-send="true" data-width="450" data-show-faces="true" data-action="recommend"></div>
                            <div class="fb-like hidden-lg hidden-md" data-layout="button_count" data-href="{$systemurl}{if $seofriendlyurls}{$WEB_ROOT}/announcements/{$announcement.id}/{$announcement.urlfriendlytitle}.html{else}announcements.php?id={$announcement.id}{/if}" data-send="true" data-width="450" data-show-faces="true" data-action="recommend"></div>
                        {/if}
                    </div>
                {/if}
            {/foreach}
        </div>

        <div class="home-right twitter-feed">
            <h2>{$LANG.twitterlatesttweets}</h2>
            <div id="twitterFeedOutput">
                <p class="text-center"><img src="{$BASE_PATH_IMG}/loading.gif" /></p>
            </div>
            <script type="text/javascript" src="templates/{$template}/js/twitter.js"></script>
        </div>

    </div>
</div>