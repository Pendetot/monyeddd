@extends('layouts.app')

@section('title', 'Pengaturan SuperAdmin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card table-card">
                <div class="card-header d-flex align-items-center justify-content-between py-3">
                    <h5>Pengaturan Sistem</h5>
                </div>
                <div class="card-body py-2 px-0">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('superadmin.settings.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="px-4 py-3">
                            <div class="form-group">
                                <label for="is_form_enabled">Aktifkan Formulir Pendaftaran</label>
                                <select name="is_form_enabled" id="is_form_enabled" class="form-control">
                                    <option value="true" {{ $is_form_enabled->value === 'true' ? 'selected' : '' }}>Aktif</option>
                                    <option value="false" {{ $is_form_enabled->value === 'false' ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                            </div>

                            </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Simpan Pengaturan Umum</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-xl-12">
            <div class="card table-card">
                <div class="card-header d-flex align-items-center justify-content-between py-3">
                    <h5>Pengaturan SMTP Email</h5>
                </div>
                <div class="card-body py-2 px-0">
                    <form action="{{ route('superadmin.settings.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="px-4 py-3">
                            <div class="form-group">
                                <label for="mail_mailer">MAIL_MAILER</label>
                                <input type="text" name="mail_mailer" id="mail_mailer" class="form-control" value="{{ $mail_mailer->value ?? '' }}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="mail_host">MAIL_HOST</label>
                                <input type="text" name="mail_host" id="mail_host" class="form-control" value="{{ $mail_host->value ?? '' }}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="mail_port">MAIL_PORT</label>
                                <input type="number" name="mail_port" id="mail_port" class="form-control" value="{{ $mail_port->value ?? '' }}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="mail_username">MAIL_USERNAME</label>
                                <input type="text" name="mail_username" id="mail_username" class="form-control" value="{{ $mail_username->value ?? '' }}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="mail_password">MAIL_PASSWORD</label>
                                <input type="password" name="mail_password" id="mail_password" class="form-control" value="{{ $mail_password->value ?? '' }}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="mail_encryption">MAIL_ENCRYPTION</label>
                                <input type="text" name="mail_encryption" id="mail_encryption" class="form-control" value="{{ $mail_encryption->value ?? '' }}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="mail_from_address">MAIL_FROM_ADDRESS</label>
                                <input type="email" name="mail_from_address" id="mail_from_address" class="form-control" value="{{ $mail_from_address->value ?? '' }}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="mail_from_name">MAIL_FROM_NAME</label>
                                <input type="text" name="mail_from_name" id="mail_from_name" class="form-control" value="{{ $mail_from_name->value ?? '' }}">
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Simpan Pengaturan SMTP</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
