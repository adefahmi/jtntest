@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row justify-content-center align-items-center">
               <div class="card">
                   <div class="card-header">
                       <h4 class="text-center"><b>GENAP</b></h4>
                   </div>
                   <table class="table table-bordered" id="handphone">
                       <thead>
                           <tr>
                               <th>Nomor</th>
                               <th>Provider</th>
                               <th style="width: 150px">Action</th>
                           </tr>
                       </thead>
                       <tbody id="hp-genap">
                       </tbody>
                   </table>
               </div>
           </div>
        </div>
        <div class="col-md-6">
            <div class="row justify-content-center align-items-center">
               <div class="card">
                   <div class="card-header">
                       <h4 class="text-center"><b>GANJIL</b></h4>
                   </div>
                   <table class="table table-bordered" id="handphone">
                       <thead>
                           <tr>
                               <th>Nomor</th>
                               <th>Provider</th>
                               <th style="width: 150px">Action</th>
                           </tr>
                       </thead>
                       <tbody id="hp-ganjil">
                       </tbody>
                   </table>
               </div>
           </div>
        </div>
    </div>
</div>
@endsection

@section('custom_head')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@endsection


@section('js')
<script>
    let url = '/api/handphone';
    var genap = [];
    var ganjil = [];

    fetch(url)
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      genap = data.data.genap;
      ganjil = data.data.ganjil;

      showData(genap, 'hp-genap');
      showData(ganjil, 'hp-ganjil');
    })

function showData(data, tbl)
{
    if (data.length > 0) {
        var temp = "";
        data.forEach((itemData) => {
                temp += "<tr>";
                temp += "<td>" + itemData.nomor + "</td>";
                temp += "<td>" + itemData.provider.nama + "</td>";
                temp += "<td>" + `<a class="btn btn-warning btn-sm" href="/edit/` + itemData.id + `">Edit</a>
                    <a href="javascript:void(0)" data-id="`+ itemData.id + `" class="btn btn-danger btn-sm" onclick="deleteData(event.target)">Delete</a>`
                        + "</td></tr>";
                });
            document.getElementById(tbl).innerHTML = temp;
    }
}

function deleteData(event) {
    var id  = $(event).data("id");
    let _url = `/api/handphone/${id}`;
    let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: _url,
        type: 'DELETE',
        data: {
          _token: _token
        },
        success: function(response) {
            location.reload();
        }
      });
  }

setTimeout(function(){
   window.location.reload(1);
}, 5000);

</script>
@endsection
