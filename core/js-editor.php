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