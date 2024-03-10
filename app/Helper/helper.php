<?php

use App\Models\Page;
use App\Models\Enquery;

function getMenuPages() {
    $pages = Page::orderBy("ordering")->where("status",1)->where('parent_id',0)->get();

    return $pages;
}
function getSubMenuPages($id) {
    $pages = Page::orderBy("ordering")->where("status",1)->where('parent_id',$id)->get();

    return $pages;
}
function SubSubManu($id) {
    $pages = Page::where("status",1)->where('parent_id',$id)->get();

    return $pages;
}

 function getEnquery() {
    $enquery = Enquery::where("status",1)->count();
    return $enquery;
}

?>