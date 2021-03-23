@extends('layouts.app')
@push('styles')
<style>
    .tab{
        background: #eeeeee;
        height: 60px;
        padding: 5px 15px 5px 8px;
    }
    a{
        color:black;
        font-weight:600;
    }
    .dottedBorder{
        border-style: dashed;
        width: 100%;
        height: 50px;
        border-radius: 10px;
        border-width: thin;
    }
    #todoName{
        width:100%;
    }
    .active a{
        color:blue !important;
    }
    .done label{
        text-decoration: line-through;
    }
</style>
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ToDo List</div>

                <div class="panel-body">
                    <div class="tab">
                        <ul id="menu-topmenu" class="nav navbar-nav navbar-right">
                            <li class="active tabs"><a href="#">All</a></li>
                            <li class="tabs"><a href="#">Done</a></li>
                            <li class="tabs"><a href="#">Pending</a></li>
                        </ul>
                    </div>
                    <br>
                    @foreach($toDoArray as $data)
                    <div class=@if($data->is_done==0) "pending" @else "done" @endif>
                    <input type="checkbox"  onclick='window.location.assign("{{ URL('/updateStatus/'.$data->id )}}")'/>
                    <label>{{$data->todo}}</label>
                    </div>
                    @endforeach
                    <br>
                    <button class="dottedBorder" data-toggle="modal" data-target="#addNew">+Add</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addNew" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title">Type your 'ToDo' in the given box and click the submit button to save.</h5>
      </div>
      <form id="addNewToDo" name = "addNewToDo" method="POST" action="{{Route('toDoAction')}}">
      {{ csrf_field() }}
      <div class="modal-body">
        <textarea id="todoName" name="todoName" required></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script>
$('.done').find('input').prop('checked',true);
 $('.tabs').on('click', function(){
   if($(this).find('a').text()=="Done"){
       $('.pending').hide();
       $('.done').show();
       $('.dottedBorder').hide();
   }
   else if($(this).find('a').text()=="Pending"){
       $('.pending').show();
       $('.done').hide();
       $('.dottedBorder').show();
   }
   else{
       $('.pending').show();
       $('.done').show();
       $('.dottedBorder').show();
   }
   $('.active').removeClass('active');
   $(this).addClass('active');
 });
</script>
@endpush
