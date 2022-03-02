@extends('layouts.master')

@section('content')
<div class="container">
    <a class="btn btn-primary float-right mt-3 mb-4" href="javascript:void(0)" id="createNewTodo"> Yeni Proje ekle</a>
    <br><br>
    <table style="background: #0000000f; border: 1px solid #000;" class="table table-hover table-bordered data-table">
        <thead>
            <tr>
                <th width="10%">Numara</th>
                <th width="20%">Başlık</th>
                <th width="15%">Görev</th>
                <th width="15%">Ücret</th>
                <th width="10%">Yer</th>
                <th width="10%">durum</th>
                <th width="20%">Düzenleme</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="todoForm" name="todoForm" class="form-horizontal">
                   <input type="hidden" name="todo_id" id="todo_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Başlık</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Başlık Gir" value="" maxlength="50" required="">
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Detaylar</label>
                        <div class="col-sm-12">
                            <textarea id="task" name="task" required="" placeholder="Görev Gir" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Fiyat</label>
                        <div class="col-sm-12">
                            <textarea id="cost" name="cost" required="" placeholder="Fiyat Gir" class="form-control"></textarea>
                        </div>
                    </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Yer</label>
                        <div class="col-sm-12">
                            <textarea id="location" name="location" required="" placeholder="Yeri Gir" class="form-control"></textarea>
                        </div>
                    </div>
 

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Durum</label>
                        <div class="col-sm-12">
                             <input type="checkbox" name="status" id="status" value="Yapıldı"
              placeholder="Your description Here" required>
                        </div>
                    </div>

 

                     
      
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="kaydetBtn" value="olustur">Değişiklikleri kaydet
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
