@extends('layouts.app')
@component('components.header')
@endcomponent

@section('content')
    <div class="app">
        <div>
            <h1 class="mx-5">祝日マスタ</h1>
            <!-- 検索 -->
            <div class="mx-5">
                <div class="card">
                    <div class="card-header">検索条件</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('holiday.search') }}">
                            @csrf
                            <div class="row">
                                <div class="col-auto">
                                    <label for="searchDate" class="form-label">日付:</label>
                                    <input type="date" name="HolidayDate" id="searchDate" class="form-control"
                                        style="width: 400px" />
                                    <div id="passwordHelpBlock" class="form-text"></div>
                                </div>

                                <div class="col-auto">
                                    <label for="searchHoliday" class="form-label">祝日名:</label>
                                    <input type="text" name="HolidayName" id="searchHoliday" class="form-control"
                                        style="width: 400px" />
                                    <div id="passwordHelpBlock" class="form-text"></div>
                                </div>
                            </div>

                            <div class="text-end mt-1">
                                <button type="submit" class="btn btn-warning mx-1" name="action"
                                    value = "clear">クリア</button>
                                <button type="submit" class="btn btn-info" name ="action">検索</button>
                            </div>
                        </form>
                    </div>
                </div>


                <!-- 検索結果 -->
                <div class="card mt-5">
                    <div class="card-header">検索結果</div>
                    <div class="card-body">
                        <div class="text-end">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#shinkiModal">新規</button>
                            <button type="button" class="btn btn-primary mx-1" data-bs-toggle="modal"
                                data-bs-target="#koushinModal">更新</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#sakuzyoModal">削除</button>
                        </div>

                        <holidaymodal-component></holidaymodal-component>

                        <table class="table mt-4">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">日付</th>
                                    <th scope="col">祝日名</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @if (isset($holidays))
                                    @foreach ($holidays as $holiday)
                                        <tr>
                                            <th scope="row"><input type="radio" name="item"
                                                    value="{{ $holiday->id }}"></th>
                                            <td>
                                                @php
                                                    // yyyymmddをYYYY/MM/DD形式に変換
                                                    $formattedDate =
                                                        substr($holiday->yyyymmdd, 0, 4) .
                                                        '/' .
                                                        substr($holiday->yyyymmdd, 4, 2) .
                                                        '/' .
                                                        substr($holiday->yyyymmdd, 6, 2);
                                                @endphp
                                                {{ $formattedDate }}
                                            </td>
                                            <td>{{ $holiday->holiday_name }}</td>
                                        </tr>
                                    @endforeach
                                @elseif(isset($results))
                                    @foreach ($results as $result)
                                        <tr>
                                            <th scope="row"><input type="radio" name="item"
                                                    value="{{ $result->id }}"></th>
                                            <td>
                                                @php
                                                    // yyyymmddをYYYY/MM/DD形式に変換
                                                    $formattedDate =
                                                        substr($result->yyyymmdd, 0, 4) .
                                                        '/' .
                                                        substr($result->yyyymmdd, 4, 2) .
                                                        '/' .
                                                        substr($result->yyyymmdd, 6, 2);
                                                @endphp
                                                {{ $formattedDate }}
                                            </td>
                                            <td>{{ $result->holiday_name }}</td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>

                        <div class="container">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination d-flex justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="#">前</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">次</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
