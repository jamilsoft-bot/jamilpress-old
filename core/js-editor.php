<?php

include("editor/editor.php");


function post_editor()
{
    $post = new Editor();
    $link = new Js_path();
    $post->post_editor('..'.$link->get_CorePath().'/js-post.php');
}

function post_simple_editor()
{
    $post = new Editor();
    $link = new Js_path();
    $post->post_simple_editor('..'.$link->get_CorePath().'/js-post.php?ops=create');
}

function page_simple_editor()
{
    $post = new Editor();
    $link = new Js_path();
    $post->page_simple_editor('..'.$link->get_CorePath().'/js-pages.php?ops=create');
}

function comment_simple_editor($PID)
{
    $post = new Editor();
    $link = new Js_path();
    $post->comment_simple_editor('..'.$link->get_CorePath().'/js-comment.php?ops=create',$PID);
}

function post_updator($id)
{
    $db = new Js_DB();
    $data = $db->Retrive_post('Single',$id);
    $row = $db->Rows($data);
    $post = new Editor();
    $link = new Js_path();
    $post->post_updator('..'.$link->get_CorePath().'/js-post.php?ops=update',$row,$id);
}


function page_updator($id)
{
    $db = new Js_DB();
    $data = $db->Retrive_post('Single',$id);
    $row = $db->Rows($data);
    $post = new Editor();
    $link = new Js_path();
    $post->post_updator('..'.$link->get_CorePath().'/js-pages.php?ops=update',$row,$id);
}

function comment_updator($id)
{
   /** */ $db = new Js_DB();
    $data = $db->Retrive_Comment('Single',$id);
   // $r = mysqli_assoc();
    $row = $db->Rows($data);
    $post = new Editor();
    $link = new Js_path();
    $post->comment_updator('..'.$link->get_CorePath().'/js-comment.php?ops=update',$row,$id);/***/

  
}

function setting_updator($id)
{
   /** */ $db = new Js_DB();
    $data = $db->Retrive_Js_option('Single',$id);
   // $r = mysqli_assoc();
    $row = $db->Rows($data);
    $post = new Editor();
    $link = new Js_path();
    $post->setting_updator('..'.$link->get_CorePath().'/js-option.php?update',$row,$id);/***/
   // echo $row['Option_Name'];
  
}


function user_updator($id)
{
    $db = new Js_DB();
    $data = $db->Retrive_user('Single',$id);
    $row = $db->Rows($data);
    $post = new Editor();
    $link = new Js_path();
    $post->user_updator('..'.$link->get_CorePath().'/js-api.php?update=user',$row,$id);
}


function user_simple_editor()
{
    $post = new Editor();
    $link = new Js_path();
    $post->user_simple_editor('..'.$link->get_CorePath().'/js-users.php?ops=create');
}