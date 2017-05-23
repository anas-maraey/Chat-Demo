@extends('layouts.app')
@section('content')
  <div class="container" id="app">
      <h1>Chaat Room</h1>
      <chat-log v-bind:messages="messages"></chat-log>
      <chat-composer v-on:messagesent="addMessage"></chat-composer>
  </div>
@endsection
