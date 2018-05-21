@extends('layouts.without-sidebar')

<?php $title = (isset($title)) ? $title : 'Home'; ?>

@section('title', $title)

@section('main')
        <p> Home page!!!</p>
@stop