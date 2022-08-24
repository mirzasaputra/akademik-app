<?php

function customView($view, $data = [])
{
    if(\Request::ajax()) {
        return view($view, $data);
    } else {
        return view('layouts.app', $data);
    }
}