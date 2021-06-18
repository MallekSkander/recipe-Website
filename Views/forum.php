<?php 

include "../Controller/sujetC.php";


$forumC = new  ForumC();


if(isset($_POST["action"]) && $_POST["action"] == "post")
{
        if (isset($_POST["title"]) && isset($_POST["contents"])) {
            if (!empty($_POST["title"]) && !empty($_POST["contents"])) {

                $thread = new forum(
                    "slouma",
                    $_POST["title"],
                    $_POST["contents"]
                );
                $forumC->ajouterThread($thread);
                //header('location:detail.php');

            } else
                $error = "Missing information";
        }
}





    $listeU = $forumC->afficherThreads();

    $counter = 0;

    foreach ($listeU as $forum) {


        
        $allData[$counter]["post"] = $forum;

        $associatedComments = $forumC->getThreadComments($forum["ID"]);
        $allData[$counter]["comments"] = [];
        foreach($associatedComments as $comment)
        {
            $allData[$counter]["comments"][] = $comment;
        }

        $counter++;

    }


    //VAR_DUMP($allData);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>bs4 forum - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.inner-wrapper {
    position: relative;
    height: calc(100vh - 3.5rem);
    transition: transform 0.3s;
}
@media (min-width: 992px) {
    .sticky-navbar .inner-wrapper {
        height: calc(100vh - 3.5rem - 48px);
    }
}

.inner-main,
.inner-sidebar {
    position: absolute;
    top: 0;
    bottom: 0;
    display: flex;
    flex-direction: column;
}
.inner-sidebar {
    left: 0;
    width: 235px;
    border-right: 1px solid #cbd5e0;
    background-color: #fff;
    z-index: 1;
}
.inner-main {
    right: 0;
    left: 235px;
}
.inner-main-footer,
.inner-main-header,
.inner-sidebar-footer,
.inner-sidebar-header {
    height: 3.5rem;
    border-bottom: 1px solid #cbd5e0;
    display: flex;
    align-items: center;
    padding: 0 1rem;
    flex-shrink: 0;
}
.inner-main-body,
.inner-sidebar-body {
    padding: 1rem;
    overflow-y: auto;
    position: relative;
    flex: 1 1 auto;
}
.inner-main-body .sticky-top,
.inner-sidebar-body .sticky-top {
    z-index: 999;
}
.inner-main-footer,
.inner-main-header {
    background-color: #fff;
}
.inner-main-footer,
.inner-sidebar-footer {
    border-top: 1px solid #cbd5e0;
    border-bottom: 0;
    height: auto;
    min-height: 3.5rem;
}
@media (max-width: 767.98px) {
    .inner-sidebar {
        left: -235px;
    }
    .inner-main {
        left: 0;
    }
    .inner-expand .main-body {
        overflow: hidden;
    }
    .inner-expand .inner-wrapper {
        transform: translate3d(235px, 0, 0);
    }
}

.nav .show>.nav-link.nav-link-faded, .nav-link.nav-link-faded.active, .nav-link.nav-link-faded:active, .nav-pills .nav-link.nav-link-faded.active, .navbar-nav .show>.nav-link.nav-link-faded {
    color: #3367b5;
    background-color: #c9d8f0;
}

.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #467bcb;
}
.nav-link.has-icon {
    display: flex;
    align-items: center;
}
.nav-link.active {
    color: #467bcb;
}
.nav-pills .nav-link {
    border-radius: .25rem;
}
.nav-link {
    color: #4a5568;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}
    </style>
</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
<div class="container" style="max-width: 100%">
<div class="main-body p-0">
    <div class="inner-wrapper">
        <!-- Inner sidebar -->
        <div class="inner-sidebar">
            <!-- Inner sidebar header -->
            <div class="inner-sidebar-header justify-content-center">
                <button class="btn btn-primary has-icon btn-block" type="button" data-toggle="modal" data-target="#threadModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-2">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    NEW DISCUSSION
                </button>
            </div>
            <!-- /Inner sidebar header -->

            <!-- Inner sidebar body -->
            <div class="inner-sidebar-body p-0">
                <div class="p-3 h-100" data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: -16px;">
                        <div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 16px;">
                                        <nav class="nav nav-pills nav-gap-y-1 flex-column">
                                            <a href="javascript:void(0)" class="nav-link nav-link-faded has-icon active">All Threads</a>
                                            <a href="javascript:void(0)" class="nav-link nav-link-faded has-icon">Popular this week</a>
                                            <a href="javascript:void(0)" class="nav-link nav-link-faded has-icon">Popular all time</a>
                                            <a href="javascript:void(0)" class="nav-link nav-link-faded has-icon">Solved</a>
                                            <a href="javascript:void(0)" class="nav-link nav-link-faded has-icon">Unsolved</a>
                                            <a href="javascript:void(0)" class="nav-link nav-link-faded has-icon">No replies yet</a>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: 234px; height: 292px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 151px; display: block; transform: translate3d(0px, 0px, 0px);"></div></div>
                </div>
            </div>
            <!-- /Inner sidebar body -->
        </div>
        <!-- /Inner sidebar -->

        <!-- Inner main -->
        <div class="inner-main">
            <!-- Inner main header -->
            <div class="inner-main-header">
                <a class="nav-link nav-icon rounded-circle nav-link-faded mr-3 d-md-none" href="#" data-toggle="inner-sidebar"><i class="material-icons">arrow_forward_ios</i></a>
                <select class="custom-select custom-select-sm w-auto mr-1">
                    <option selected="">Latest</option>
                    <option value="1">Popular</option>
                    <option value="3">Solved</option>
                    <option value="3">Unsolved</option>
                    <option value="3">No Replies Yet</option>
                </select>
                <span class="input-icon input-icon-sm ml-auto w-auto">
                    <input type="text" class="form-control form-control-sm bg-gray-200 border-gray-200 shadow-none mb-4 mt-4" placeholder="Search forum" />
                </span>
            </div>
            <!-- /Inner main header -->

            <!-- Inner main body -->

            <!-- Forum List -->
            <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">

                        <?php 
                      
                        $counterPosts = 0;
                      foreach ($allData as $post) {
                            $forum = $post["post"];

                          ?>


                <div class="card mb-2">
                    <div class="card-body p-2 p-sm-3">
                        <div class="media forum-item">
                            <a href="#" data-toggle="collapse" data-target=".forum-content"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="mr-3 rounded-circle" width="50" alt="User" /></a>
                            <div class="media-body">
                            <h6><a href="#" data-toggle="collapse" data-target=".forum-content" class="text-body clickPost" postInd="<?php echo $counterPosts; ?>"><?php echo $forum['titre']; ?></a>
                                <br><a href="showUser?id=<?php echo $forum['utilisateur']; ?>"><?php echo $forum['utilisateur']; ?></a></h6>

                                <p class="text-secondary">
                                    <?php echo $forum['contenu']; ?>
                                </p>
                                <?php
                                if(count($post["comments"]) > 0)
                                {
                                            ?>
                                
                                
                                
                                <p class="text-muted"><a href="javascript:void(0)"><?php echo $post["comments"][count($post["comments"]) - 1]["user"]; ?></a> replied <span class="text-secondary font-weight-bold"><?php 
                                
                                $dt1 = new DateTime();
                                $dt2 = new DateTime();
                                $dt1->setTimestamp(time()-3600);
                                $dt2->setTimestamp(strtotime($post["comments"][count($post["comments"]) - 1]["date_comment"]));
                                $theDiff = $dt1->diff($dt2);
                                $sometest = 0;
                                if($theDiff->y > 0)
                                {
                                    echo $theDiff->format('%y year') . ($theDiff->y>1?'s ':' ');
                                    $sometest = 1;
                                }if($theDiff->m > 0)
                                {
                                    echo $theDiff->format('%m month') . ($theDiff->m>1?'s ':' ');
                                    $sometest = 1;
                                }
                                if($theDiff->d > 0)
                                {
                                    echo $theDiff->format('%d day') . ($theDiff->d>1?'s ':' ');
                                    $sometest = 1;
                                }
                                if($theDiff->h > 0)
                                {
                                    echo $theDiff->format('%h hour') . ($theDiff->h>1?'s ':' ');
                                    $sometest = 1;
                                }
                                if($theDiff->i > 0)
                                {
                                    echo $theDiff->format('%i minute') . ($theDiff->i>1?'s ':' ');
                                }
                                else if($sometest == 0)
                                {
                                    echo "Few seconds ";
                                }
                                echo 'ago.';
                                 ?></span></p>
                                <?php
                                
        } $counterPosts++;?>
                                <span class="text-secondary font-weight-bold"><?php echo $forum['date']; ?></span>
                            </div>
                            <div class="text-muted small text-center align-self-center">
                                <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 20</span>
                                <span><i class="far fa-comment ml-2"></i> <?php echo count($post["comments"]); ?></span>
                            </div>
                        </div>
                    </div>
                </div>



                <?php
        } ?>


                <ul class="pagination pagination-sm pagination-circle justify-content-center mb-0">
                    <li class="page-item disabled">
                        <span class="page-link has-icon"><i class="material-icons">chevron_left</i></span>
                    </li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
                    <li class="page-item active"><span class="page-link">2</span></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                    <li class="page-item">
                        <a class="page-link has-icon" href="javascript:void(0)"><i class="material-icons">chevron_right</i></a>
                    </li>
                </ul>
            </div>
            <!-- /Forum List -->

            <!-- Forum Detail -->
            <div class="inner-main-body p-2 p-sm-3 collapse forum-content">
                <a href="#" class="btn btn-light btn-sm mb-3 has-icon" data-toggle="collapse" data-target=".forum-content"><i class="fa fa-arrow-left mr-2"></i>Back</a>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="media forum-item">
                            <a href="javascript:void(0)" class="card-link">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" width="50" alt="User" />
                                <small class="d-block text-center text-muted">Newbie</small>
                            </a>
                            <div class="media-body ml-3">
                                <a href="javascript:void(0)" class="text-secondary" id="threadOwner">Mokrani</a>
                                <small class="text-muted ml-2" id="threadDate">1 hour ago</small>
                                <h5 class="mt-1" id="threadTitle">Realtime fetching data</h5>
                                <div class="mt-3 font-size-sm" id="threadData">
                                    <p>Hellooo :)</p>
                                    <p>
                                        I'm newbie with laravel and i want to fetch data from database in realtime for my dashboard anaytics and i found a solution with ajax but it dosen't work if any one have a simple solution it will be
                                        helpful
                                    </p>
                                    <p>Thank</p>
                                </div>
                            </div>
                            <div class="text-muted small text-center">
                                <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 19</span>
                                <span><i class="far fa-comment ml-2"></i> 3</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="threadCommentsSpace">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="media forum-item">
                                <a href="javascript:void(0)" class="card-link">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle" width="50" alt="User" />
                                    <small class="d-block text-center text-muted">Pro</small>
                                </a>
                                <div class="media-body ml-3">
                                    <a href="javascript:void(0)" class="text-secondary">drewdan</a>
                                    <small class="text-muted ml-2">1 hour ago</small>
                                    <div class="mt-3 font-size-sm">
                                        <p>What exactly doesn't work with your ajax calls?</p>
                                        <p>Also, WebSockets are a great solution for realtime data on a dashboard. Laravel offers this out of the box using broadcasting</p>
                                    </div>
                                    <button class="btn btn-xs text-muted has-icon"><i class="fa fa-heart" aria-hidden="true"></i>1</button>
                                    <a href="javascript:void(0)" class="text-muted small">Reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <!--- ADD COMMENT TTT -->
                <div class="card mb-2">
                        <div class="card-body">
                            <div class="media forum-item">
                                <a href="javascript:void(0)" class="card-link">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle" width="50" alt="User" />
                                    <small class="d-block text-center text-muted">Pro</small>
                                </a>
                                <div class="media-body ml-3">
                                    <h6><a href="javascript:void(0)" class="text-secondary">slouma</a></h6>
                                    
                       

                                    <div class="form-group">
                                        <textarea class="form-control" id="commentBoxInput" name="contents" rows="2" placeholder="Add Comment" required></textarea>
                                    </div>
                   
                                    <div class="modal-footer">
                                    <button type="button" id="commentBTN" class="btn btn-primary">Comment</button>
                                    </div>

                                </div>




                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- /Forum Detail -->

            <!-- /Inner main body -->
        </div>
        <!-- /Inner main -->
    </div>

    <!-- New Thread Modal -->
    <div class="modal fade" id="threadModal" tabindex="-1" role="dialog" aria-labelledby="threadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form  method="post">
                <input type="hidden"name="action" value="post">
                    <div class="modal-header d-flex align-items-center bg-primary text-white">
                        <h6 class="modal-title mb-0" id="threadModalLabel">New Discussion</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="threadTitleInput">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter title" autofocus="" required />
                        </div>
                        

                        <div class="form-group">
                            <label for="threadTitleInput">Content</label>
                            <textarea class="form-control" name="contents" rows="5" placeholder="Textarea" required></textarea>
                        </div>
                        <!--
                        <div class="custom-file form-control-sm mt-3" style="max-width: 300px;">
                            <input type="file" class="custom-file-input" id="customFile" multiple="" />
                            <label class="custom-file-label" for="customFile">Attachment</label>
                        </div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	

    var postsData = <?php echo json_encode($allData); ?>;

        var currentCommentsId = -1;
        function setUpComments(postId)
        {
            var postComments = postsData[postId]["comments"];

            $( "#threadCommentsSpace" ).empty();


            for(var s=0;s<postComments.length;s++)
            {


            var commentHTML = '<div class="card mb-2">'+
'                        <div class="card-body">'+
'                            <div class="media forum-item">'+
'                                <a href="javascript:void(0)" class="card-link">'+
'                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle" width="50" alt="User" />'+
'                                    <small class="d-block text-center text-muted">Pro</small>'+
'                                </a>'+
'                                <div class="media-body ml-3">'+
'                                    <a href="javascript:void(0)" class="text-secondary">'+ postComments[s]["user"]+'</a>'+
'                                    <small class="text-muted ml-2">'+postComments[s]["date_comment"]+'</small>'+
'                                    <div class="mt-3 font-size-sm">'+
'                                        <p>'+postComments[s]["content"]+'</p>'+
'                                    </div>'+
'                                    <button class="btn btn-xs text-muted has-icon"><i class="fa fa-heart" aria-hidden="true"></i>1</button>'+
'                                    <a href="javascript:void(0)" class="text-muted small">Reply</a>'+
'                                </div>'+
'                            </div>'+
'                        </div>'+
'                    </div>';
	

                $( "#threadCommentsSpace" ).append(commentHTML);


            }
        }

        function setUpPost(postId)
        {
            var postData = postsData[postId]["post"];
            //$( "#threadTitle" ).remove();
            $( "#threadTitle" ).html(postData["titre"]);
            $( "#threadOwner" ).html(postData["utilisateur"]);
            $( "#threadData" ).html(postData["contenu"]);
            $( "#threadDate" ).html(postData["date"]);
            currentCommentsId = postId;
        }

        $( "#commentBTN" ).click(function(){
            var today = new Date();
            console.log($( "#commentBoxInput" ).val());
            console.log()
            var postComments = postsData[currentCommentsId]["comments"];
            var commentData = {ID_post:postsData[currentCommentsId]["post"]["ID"], user:"slouma", content:($( "#commentBoxInput" ).val()), date_comment: (today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate() + " " + today.toTimeString().split(' ')[0])};
            postComments.push(commentData)
            
            setUpComments(currentCommentsId);


            $( "#commentBoxInput" ).val("");



            $.get( "../Controller/postComment.php?postId="+commentData.ID_post + "&content=" + commentData.content, function( data ) {

                        /// can put loading codes instead and change the display here




            });
        });

    $('.clickPost').each(function(btn){

        $(this).click(function(){


            var postId = parseInt(this.getAttribute("postInd"));

            setUpPost(postId); 
setUpComments(postId);



        });



    });








</script>
</body>
</html>