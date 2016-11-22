<?php include('../config.php'); ?>
<?php 
	ob_start();
    include("header.php");
    $buffer=ob_get_contents();
    ob_end_clean();
    $buffer=str_replace("%TITLE%","FAQs PAGE",$buffer);
    echo $buffer;
?>
<?php include('navbar.php'); ?>
<div class="main_container container">   
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    	<h4> Help Center </h4> <hr/>
        <!-- Nav tabs category -->
        <ul class="nav nav-tabs faq-cat-tabs">
            <li class="active"><a href="#faq-cat-1" data-toggle="tab">Asking</a></li>
            <li><a href="#faq-cat-2" data-toggle="tab">Answering</a></li>
            <li><a href="#faq-cat-3" data-toggle="tab">Our model</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content faq-cat-content">
            <div class="tab-pane active in fade" id="faq-cat-1">
                <div class="panel-group" id="accordion-cat-1">
                    <div class="panel panel-default panel-faq">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-1">
                                <h5 class="panel-title">
									What topics can I ask about here?
                                    <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                </h5>
                            </a>
                        </div>
                        <div id="faq-cat-1-sub-1" class="panel-collapse collapse">
                            <div class="panel-body">
                            	<p>Connect is for professional and enthusiast programmers, people who write code because they love it. We feel the best Connect questions have a bit of source code in them, but if your question generally covers…</p></br>

                            	<p>1. a specific programming problem, or</p>
                            	<p>2. a software algorithm, or</p>
                            	<p>3. software tools commonly used by programmers; and is</p>
                            	<p>4. a practical, answerable problem that is unique to software development</p>
                            	<p>… then you’re in the right place to ask your question!</p>                            
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default panel-faq">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-2">
                                <h4 class="panel-title">
									What types of questions should I avoid asking?
                                    <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                </h4>
                            </a>
                        </div>
                        <div id="faq-cat-1-sub-2" class="panel-collapse collapse">
                            <div class="panel-body">
								<p>First, make sure that your question is on-topic for this site.</p>

								<p>You should only ask practical, answerable questions based on actual problems that you face. Chatty, open-ended questions diminish the usefulness of our site and push other questions off the front page.</p>

								<p>Your questions should be reasonably scoped. If you can imagine an entire book that answers your question, you’re asking too much. </p>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="faq-cat-2">
                <div class="panel-group" id="accordion-cat-2">
                    <div class="panel panel-default panel-faq">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion-cat-2" href="#faq-cat-2-sub-1">
                                <h4 class="panel-title">
									What does it mean when an answer is "accepted"?
                                    <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                </h4>
                            </a>
                        </div>
                        <div id="faq-cat-2-sub-1" class="panel-collapse collapse">
                            <div class="panel-body">
								<p>When a user receives a good answer to his or her question, that user has the option to "accept" an answer. Acceptance is indicated by a colored checkmark next to the answer that has been accepted by the original author of the question.</p>

								<p>Accepting an answer is not meant to be a definitive and final statement indicating that the question has now been answered perfectly. It simply means that the author received an answer that worked for him or her personally. Not every user comes back to accept an answer, and of those who do, they might not change the accepted answer even if a newer, better answer comes along later.  </p>
						 	</div>
                        </div>
                    </div>
                    <div class="panel panel-default panel-faq">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion-cat-2" href="#faq-cat-2-sub-2">
                                <h4 class="panel-title">
									How do I write a good answer?
                                    <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                </h4>
                            </a>
                        </div>
                        <div id="faq-cat-2-sub-2" class="panel-collapse collapse">
                            <div class="panel-body">
								<p>Read the question carefully. What, specifically, is the question asking for? Make sure your answer provides that – or a viable alternative. The answer can be “don’t do that”, but it should also include “try this instead”. Any answer that gets the asker going in the right direction is helpful, but do try to mention any limitations, assumptions or simplifications in your answer. Brevity is acceptable, but fuller explanations are better.</p>
								<p>Links to external resources are encouraged, but please add context around the link so your fellow users will have some idea what it is and why it’s there. Always quote the most relevant part of an important link, in case the target site is unreachable or goes permanently offline.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="faq-cat-3">
                <div class="panel-group" id="accordion-cat-2">
                    <div class="panel panel-default panel-faq">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion-cat-3" href="#faq-cat-3-sub-1">
                                <h4 class="panel-title">
									Be nice.
                                    <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                </h4>
                            </a>
                        </div>
                        <div id="faq-cat-3-sub-1" class="panel-collapse collapse">
                            <div class="panel-body">
                            	<p>Whether you've come to ask questions, or to generously share what you know, remember that we’re all here to learn, together. Be welcoming and patient, especially with those who may not know everything you do. Oh, and bring your sense of humor. Just in case.</p>
								<p>That basically covers it. But these three guidelines may help:</p>
								<ul>
									<li>Rudeness and belittling language are not okay</li>
									<li>Be welcoming, be patient, and assume good intentions.</li>
									<li>Don't be a jerk. </li>
								</ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default panel-faq">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion-cat-3" href="#faq-cat-3-sub-2">
                                <h4 class="panel-title">
									What kind of behavior is expected of users?
                                    <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                </h4>
                            </a>
                        </div>
                        <div id="faq-cat-3-sub-2" class="panel-collapse collapse">
                            <div class="panel-body">
								<p>We’re excited to have you here, but we do ask that you follow a few guidelines when participating on our network.</p>
								<strong>Be honest.</strong>

								<p>Above all, be honest. If you see misinformation, vote it down. Add comments indicating what, specifically, is wrong. Provide better answers of your own. Last but not least, edit and improve the existing questions and answers! By doing these things, you are helping keep Stack Exchange a great place to share knowledge of our craft.</p>

								<p>While you’re doing all of those things, we also require that you...</p>

								<b>Be nice.</b>

								<p>Whether you've come to ask questions, or to generously share what you know, remember that we’re all here to learn, together. Be welcoming and patient, especially with those who may not know everything you do. Oh, and bring your sense of humor. Just in case.</p>

								<p>For specific guidelines, see: Be nice - principles and practice.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
<?php include('script_files');?>
<?php include('footer.php') ?>