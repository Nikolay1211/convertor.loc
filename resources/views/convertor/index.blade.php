@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Конвертор файлов</h3>
        <form class="" id="form-convert" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group row">
                <label for="FormControlFile1" class="col-2 col-form-label">Файл для конвертирования</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file form-control-sm" name="upload-file" id="FormControlFile1">
                    <small class="form-text text-muted">Допустмые форматы: json, xml, csv, yaml.</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="FormControlFile1" class="col-2 col-form-label">Выходной формат файла</label>
                <select class="custom-select custom-select-sm col-3" name="format">
                    <option value="json">Json</option>
                    <option value="xml">Xml</option>
                    <option value="csv">Csv</option>
                    <option value="yaml">Yaml</option>
                </select>
            </div>
            <div class="form-group row">
                <div class="col-3">
                    <button type="submit" class="btn btn-primary">Конвертировать</button>
                </div>
                <div class="col-4" id="link">
                    <a href="" class="btn btn-success">Скачать файл</a>
                </div>
            </div>
        </form>
    </div>
@endsection