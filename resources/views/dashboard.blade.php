@extends('layouts.app', ['page' => __('Dashboard'), 'pageSlug' => 'dashboard'])

@section('content')
<?php 
$january = 0;
$february = 0;
$march = 0;
$april = 0;
$may = 0;
$june = 0;
$july = 0;
$august = 0;
$september = 0;
$october = 0;
$november = 0;
$december = 0;
foreach ($listbill as $bill) {
    if($bill ->status == 1){
        if((int)date('m',strtotime($bill->order_date)) == 1 && (int)date('Y',time()) == (int)date('Y',strtotime($bill->order_date))){
            $january += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 2 && (int)date('Y',time()) == (int)date('Y',strtotime($bill->order_date))){
            $february += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 3 && (int)date('Y',time()) == (int)date('Y',strtotime($bill->order_date))){
            $march += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 4 && (int)date('Y',time()) == (int)date('Y',strtotime($bill->order_date))){
            $april += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 5 && (int)date('Y',time()) == (int)date('Y',strtotime($bill->order_date))){
            $may += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 6 && (int)date('Y',time()) == (int)date('Y',strtotime($bill->order_date))){
            $june += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 7 && (int)date('Y',time()) == (int)date('Y',strtotime($bill->order_date))){
            $july += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 8 && (int)date('Y',time()) == (int)date('Y',strtotime($bill->order_date))){
            $august += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 9 && (int)date('Y',time()) == (int)date('Y',strtotime($bill->order_date))){
            $september += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 10 && (int)date('Y',time()) == (int)date('Y',strtotime($bill->order_date))){
            $october += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 11 && (int)date('Y',time()) == (int)date('Y',strtotime($bill->order_date))){
            $november += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 12 && (int)date('Y',time()) == (int)date('Y',strtotime($bill->order_date))){
            $december += $bill->total_price;
        };
    };
} 
$january1 = 0;
$february1 = 0;
$march1 = 0;
$april1 = 0;
$may1 = 0;
$june1 = 0;
$july1 = 0;
$august1 = 0;
$september1 = 0;
$october1 = 0;
$november1 = 0;
$december1 = 0;
foreach ($listbill as $bill) {
    if($bill ->status == 1){
        if((int)date('m',strtotime($bill->order_date)) == 1 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-1)){
            $january1 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 2 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-1)){
            $february1 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 3 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-1)){
            $march1 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 4 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-1)){
            $april1 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 5 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-1)){
            $may1 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 6 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-1)){
            $june1 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 7 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-1)){
            $july1 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 8 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-1)){
            $august1 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 9 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-1)){
            $september1 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 10 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-1)){
            $october1 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 11 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-1)){
            $november1 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 12 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-1)){
            $december1 += $bill->total_price;
        };
    };
}
$january2 = 0;
$february2 = 0;
$march2 = 0;
$april2 = 0;
$may2 = 0;
$june2 = 0;
$july2 = 0;
$august2 = 0;
$september2 = 0;
$october2 = 0;
$november2 = 0;
$december2 = 0;
foreach ($listbill as $bill) {
    if($bill ->status == 1){
        if((int)date('m',strtotime($bill->order_date)) == 1 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-2)){
            $january2 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 2 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-2)){
            $february2 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 3 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-2)){
            $march2 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 4 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-2)){
            $april2 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 5 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-2)){
            $may2 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 6 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-2)){
            $june2 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 7 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-2)){
            $july2 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 8 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-2)){
            $august2 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 9 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-2)){
            $september2 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 10 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-2)){
            $october2 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 11 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-2)){
            $november2 += $bill->total_price;
        }elseif((int)date('m',strtotime($bill->order_date)) == 12 && (int)date('Y',time()) == ((int)date('Y',strtotime($bill->order_date))-2)){
            $december2 += $bill->total_price;
        };
    };
}
$listtopbook = [];
foreach ($listdtbill as $dtbill) {
    if(((int)date('m',time())) == (int)date('m',strtotime($dtbill->bill_order_date))){
        $i = $dtbill->book_id;
        if(array_key_exists($i , $listtopbook) == false){
            $listtopbook[$i] = 0;
        }
        $listtopbook[$i] += $dtbill->qty_bill;
    }
}
$listtopbook1 = [];
foreach ($listdtbill as $dtbill) {
    if(((int)date('m',time())-1) == (int)date('m',strtotime($dtbill->bill_order_date))){
        $i = $dtbill->book_id;
        if(array_key_exists($i , $listtopbook1) == false){
            $listtopbook1[$i] = 0;
        }
        $listtopbook1[$i] += $dtbill->qty_bill;
    }
}
$listtopbook2 = [];
foreach ($listdtbill as $dtbill) {
    if(((int)date('m',time())-2) == (int)date('m',strtotime($dtbill->bill_order_date))){
        $i = $dtbill->book_id;
        if(array_key_exists($i , $listtopbook2) == false){
            $listtopbook2[$i] = 0;
        }
        $listtopbook2[$i] += $dtbill->qty_bill;
    }
}
?>
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Total Order</h5>
                            <h2 class="card-title">Revenue</h2>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                            <label class="btn btn-sm btn-primary btn-simple active" id="0">
                                <input type="radio" name="options" checked>
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Now</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-single-02"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-primary btn-simple" id="1">
                                <input type="radio" class="d-none d-sm-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Last Year</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-gift-2"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-primary btn-simple" id="2">
                                <input type="radio" class="d-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">2 Years Ago</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-tap-02"></i>
                                </span>
                            </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartBig1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4" style="display: none !important; ">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Total Shipments</h5>
                    <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLinePurple"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4" style="flex: unset !important; max-width: unset !important;">
            <div class="card card-chart">
                <div class="card-header">
                    
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Top best selling books</h5>
                            <h2 class="card-title">Ranking</h2>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                            <label class="btn btn-sm btn-primary btn-simple active" id="3">
                                <input type="radio" name="options" checked>
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Now</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-single-02"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-primary btn-simple" id="4">
                                <input type="radio" class="d-none d-sm-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Last Month</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-gift-2"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-primary btn-simple" id="5">
                                <input type="radio" class="d-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">2 Month ago</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-tap-02"></i>
                                </span>
                            </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="CountryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4" style="display: none !important;">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Completed Tasks</h5>
                    <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> 12,100K</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLineGreen"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        {{-- <div class="col-lg-6 col-md-12">
            <div class="card card-tasks">
                <div class="card-header ">
                    <h6 class="title d-inline">Tasks(5)</h6>
                    <p class="card-category d-inline">today</p>
                    <div class="dropdown">
                        <button type="button" class="btn btn-link dropdown-toggle btn-icon" data-toggle="dropdown">
                            <i class="tim-icons icon-settings-gear-63"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#pablo">Action</a>
                            <a class="dropdown-item" href="#pablo">Another action</a>
                            <a class="dropdown-item" href="#pablo">Something else</a>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="title">Update the Documentation</p>
                                        <p class="text-muted">Dwuamish Head, Seattle, WA 8:47 AM</p>
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Edit Task">
                                            <i class="tim-icons icon-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked="">
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="title">GDPR Compliance</p>
                                        <p class="text-muted">The GDPR is a regulation that requires businesses to protect the personal data and privacy of Europe citizens for transactions that occur within EU member states.</p>
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Edit Task">
                                            <i class="tim-icons icon-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="">
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="title">Solve the issues</p>
                                        <p class="text-muted">Fifty percent of all respondents said they would be more likely to shop at a company </p>
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Edit Task">
                                            <i class="tim-icons icon-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="title">Release v2.0.0</p>
                                        <p class="text-muted">Ra Ave SW, Seattle, WA 98116, SUA 11:19 AM</p>
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Edit Task">
                                            <i class="tim-icons icon-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="title">Export the processed files</p>
                                        <p class="text-muted">The report also shows that consumers will not easily forgive a company once a breach exposing their personal data occurs. </p>
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Edit Task">
                                            <i class="tim-icons icon-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="title">Arival at export process</p>
                                        <p class="text-muted">Capitol Hill, Seattle, WA 12:34 AM</p>
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Edit Task">
                                            <i class="tim-icons icon-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-lg-6 col-md-12" style="flex: unset !important; max-width: unset !important;">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Book is out of stock</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="max-height: 500px !important">
                        <table class="table tablesorter" id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        Book Name
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Subject
                                    </th>
                                    <th>
                                        Major
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th class="text-center">
                                        Remaining Books
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listbook as $book)
                                <tr>
                                    <td>
                                      {{$book->book_name}}
                                    </td>
                                    <td>
                                      {{$book->category_name}}
                                    </td>
                                    <td>
                                        <?php 
                                        $a=[]; 
                                        foreach ($listSubject as $sj): 
                                            if($book ->subject_id == $sj ->subject_id){
                                                $a[]=$sj->name;
                                            }
                                        endforeach;
                                        if(count($a)>0){
                                            echo $a[0];
                                        }else{
                                            echo "Not in any subject";
                                        } ?>
                                    </td>
                                    <td>
                                      {{$book->major_name}}
                                    </td>
                                    <td>
                                      <p style="font-weight: 600;color: red;font-style: italic;">{{number_format($book->price)}}đ</p>
                                    </td>
                                    <td class="text-center">
                                        {{$book->qty}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12" style="flex: unset !important; max-width: unset !important;">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Top best selling books last month</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="max-height: 500px !important">
                        <table class="table tablesorter" id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        Book Name
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Subject
                                    </th>
                                    <th>
                                        Major
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th class="text-center">
                                        Number of books sold
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php arsort($listtopbook1); ?>
                                @foreach($listtopbook1 as $key => $value)
                                <tr>
                                    @foreach($listbook2 as $book)
                                    @if($book->book_id == $key)
                                    <td>
                                        {{$book->book_name}}
                                    </td>
                                    <td>
                                        {{$book->category_name}}
                                    </td>
                                    <td>
                                        <?php 
                                        $a=[]; 
                                        foreach ($listSubject as $sj): 
                                            if($book ->subject_id == $sj ->subject_id){
                                                $a[]=$sj->name;
                                            }
                                        endforeach;
                                        if(count($a)>0){
                                            echo $a[0];
                                        }else{
                                            echo "Not in any subject";
                                        } ?>
                                    </td>
                                    <td>
                                      {{$book->major_name}}
                                    </td>
                                    <td>
                                        <p style="font-weight: 600;color: red;font-style: italic;">{{number_format($book->price)}}đ</p>
                                    </td>
                                    <td class="text-center">
                                        {{$value}}
                                    </td>
                                    @endif
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        var january = Number("<?php echo $january; ?>");
        var february = Number("<?php echo $february; ?>");
        var march = Number("<?php echo $march; ?>");
        var april = Number("<?php echo $april; ?>");
        var may = Number("<?php echo $may; ?>");
        var june = Number("<?php echo $june; ?>");
        var july = Number("<?php echo $july; ?>");
        var august = Number("<?php echo $august; ?>");
        var september = Number("<?php echo $september; ?>");
        var october = Number("<?php echo $october; ?>");
        var november = Number("<?php echo $november; ?>");
        var december = Number("<?php echo $december; ?>");
        
        var january1 = Number("<?php echo $january1; ?>");
        var february1 = Number("<?php echo $february1; ?>");
        var march1 = Number("<?php echo $march1; ?>");
        var april1 = Number("<?php echo $april1; ?>");
        var may1 = Number("<?php echo $may1; ?>");
        var june1 = Number("<?php echo $june1; ?>");
        var july1 = Number("<?php echo $july1; ?>");
        var august1 = Number("<?php echo $august1; ?>");
        var september1 = Number("<?php echo $september1; ?>");
        var october1 = Number("<?php echo $october1; ?>");
        var november1 = Number("<?php echo $november1; ?>");
        var december1 = Number("<?php echo $december1; ?>");
        
        var january2 = Number("<?php echo $january2; ?>");
        var february2 = Number("<?php echo $february2; ?>");
        var march2 = Number("<?php echo $march2; ?>");
        var april2 = Number("<?php echo $april2; ?>");
        var may2 = Number("<?php echo $may2; ?>");
        var june2 = Number("<?php echo $june2; ?>");
        var july2 = Number("<?php echo $july2; ?>");
        var august2 = Number("<?php echo $august2; ?>");
        var september2 = Number("<?php echo $september2; ?>");
        var october2 = Number("<?php echo $october2; ?>");
        var november2 = Number("<?php echo $november2; ?>");
        var december2 = Number("<?php echo $december2; ?>");
        mychart = {
            initDashboardPageCharts: function() {

                gradientChartOptionsConfigurationWithTooltipBlue = {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },

                tooltips: {
                    backgroundColor: '#f5f5f5',
                    titleFontColor: '#333',
                    bodyFontColor: '#666',
                    bodySpacing: 4,
                    xPadding: 12,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest"
                },
                responsive: true,
                scales: {
                    yAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: 'rgba(29,140,248,0.0)',
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        suggestedMin: 60,
                        suggestedMax: 125,
                        padding: 20,
                        fontColor: "#2380f7"
                    }
                    }],

                    xAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: 'rgba(29,140,248,0.1)',
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "#2380f7"
                    }
                    }]
                }
                };

                gradientChartOptionsConfigurationWithTooltipPurple = {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },

                tooltips: {
                    backgroundColor: '#f5f5f5',
                    titleFontColor: '#333',
                    bodyFontColor: '#666',
                    bodySpacing: 4,
                    xPadding: 12,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest"
                },
                responsive: true,
                scales: {
                    yAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: 'rgba(29,140,248,0.0)',
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        suggestedMin: 60,
                        suggestedMax: 125,
                        padding: 20,
                        fontColor: "#9a9a9a"
                    }
                    }],

                    xAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: 'rgba(225,78,202,0.1)',
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "#9a9a9a"
                    }
                    }]
                }
                };

                gradientChartOptionsConfigurationWithTooltipOrange = {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },

                tooltips: {
                    backgroundColor: '#f5f5f5',
                    titleFontColor: '#333',
                    bodyFontColor: '#666',
                    bodySpacing: 4,
                    xPadding: 12,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest"
                },
                responsive: true,
                scales: {
                    yAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: 'rgba(29,140,248,0.0)',
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        suggestedMin: 50,
                        suggestedMax: 110,
                        padding: 20,
                        fontColor: "#ff8a76"
                    }
                    }],

                    xAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: 'rgba(220,53,69,0.1)',
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "#ff8a76"
                    }
                    }]
                }
                };

                gradientChartOptionsConfigurationWithTooltipGreen = {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },

                tooltips: {
                    backgroundColor: '#f5f5f5',
                    titleFontColor: '#333',
                    bodyFontColor: '#666',
                    bodySpacing: 4,
                    xPadding: 12,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest"
                },
                responsive: true,
                scales: {
                    yAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: 'rgba(29,140,248,0.0)',
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        suggestedMin: 50,
                        suggestedMax: 125,
                        padding: 20,
                        fontColor: "#9e9e9e"
                    }
                    }],

                    xAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: 'rgba(0,242,195,0.1)',
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "#9e9e9e"
                    }
                    }]
                }
                };


                gradientBarChartConfiguration = {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },

                tooltips: {
                    backgroundColor: '#f5f5f5',
                    titleFontColor: '#333',
                    bodyFontColor: '#666',
                    bodySpacing: 4,
                    xPadding: 12,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest"
                },
                responsive: true,
                scales: {
                    yAxes: [{

                    gridLines: {
                        drawBorder: false,
                        color: 'rgba(29,140,248,0.1)',
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        suggestedMin: 60,
                        suggestedMax: 120,
                        padding: 20,
                        fontColor: "#9e9e9e"
                    }
                    }],

                    xAxes: [{

                    gridLines: {
                        drawBorder: false,
                        color: 'rgba(29,140,248,0.1)',
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "#9e9e9e"
                    }
                    }]
                }
                };

                var ctx = document.getElementById("chartLinePurple").getContext("2d");

                var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

                gradientStroke.addColorStop(1, 'rgba(72,72,176,0.2)');
                gradientStroke.addColorStop(0.2, 'rgba(72,72,176,0.0)');
                gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors

                var data = {
                labels: ['JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                datasets: [{
                    label: "Data",
                    fill: true,
                    backgroundColor: gradientStroke,
                    borderColor: '#d048b6',
                    borderWidth: 2,
                    borderDash: [],
                    borderDashOffset: 0.0,
                    pointBackgroundColor: '#d048b6',
                    pointBorderColor: 'rgba(255,255,255,0)',
                    pointHoverBackgroundColor: '#d048b6',
                    pointBorderWidth: 20,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 15,
                    pointRadius: 4,
                    data: [80, 100, 70, 80, 120, 80],
                }]
                };

                var myChart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: gradientChartOptionsConfigurationWithTooltipPurple
                });


                var ctxGreen = document.getElementById("chartLineGreen").getContext("2d");

                var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

                gradientStroke.addColorStop(1, 'rgba(66,134,121,0.15)');
                gradientStroke.addColorStop(0.4, 'rgba(66,134,121,0.0)'); //green colors
                gradientStroke.addColorStop(0, 'rgba(66,134,121,0)'); //green colors

                var data = {
                labels: ['JUL', 'AUG', 'SEP', 'OCT', 'NOV'],
                datasets: [{
                    label: "My First dataset",
                    fill: true,
                    backgroundColor: gradientStroke,
                    borderColor: '#00d6b4',
                    borderWidth: 2,
                    borderDash: [],
                    borderDashOffset: 0.0,
                    pointBackgroundColor: '#00d6b4',
                    pointBorderColor: 'rgba(255,255,255,0)',
                    pointHoverBackgroundColor: '#00d6b4',
                    pointBorderWidth: 20,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 15,
                    pointRadius: 4,
                    data: [90, 27, 60, 12, 80],
                }]
                };

                var myChart = new Chart(ctxGreen, {
                type: 'line',
                data: data,
                options: gradientChartOptionsConfigurationWithTooltipGreen

                });

                var chart_labels = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
                var chart_data = [january, february, march, april, may, june, july, august, september, october, november, december];

                var today = new Date();
                var datenow = Number(today.getMonth()+1);
                for(i = 0 ; i < chart_data.length ; i++){
                    if(i >= datenow){
                        chart_data[i] = null;
                    } 
                }


                var ctx = document.getElementById("chartBig1").getContext('2d');

                var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

                gradientStroke.addColorStop(1, 'rgba(72,72,176,0.1)');
                gradientStroke.addColorStop(0.4, 'rgba(72,72,176,0.0)');
                gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors
                var config = {
                type: 'line',
                data: {
                    labels: chart_labels,
                    datasets: [{
                    label: "My First dataset",
                    fill: true,
                    backgroundColor: gradientStroke,
                    borderColor: '#d346b1',
                    borderWidth: 2,
                    borderDash: [],
                    borderDashOffset: 0.0,
                    pointBackgroundColor: '#d346b1',
                    pointBorderColor: 'rgba(255,255,255,0)',
                    pointHoverBackgroundColor: '#d346b1',
                    pointBorderWidth: 20,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 15,
                    pointRadius: 4,
                    data: chart_data,
                    }]
                },
                options: gradientChartOptionsConfigurationWithTooltipPurple
                };
                var myChartData = new Chart(ctx, config);
                $("#0").click(function() {
                var data = myChartData.config.data;
                data.datasets[0].data = chart_data;
                data.labels = chart_labels;
                myChartData.update();
                });
                $("#1").click(function() {
                var chart_data = [january1, february1, march1, april1, may1, june1, july1, august1, september1, october1, november1, december1];
                var data = myChartData.config.data;
                data.datasets[0].data = chart_data;
                data.labels = chart_labels;
                myChartData.update();
                });

                $("#2").click(function() {
                var chart_data = [january2, february2, march2, april2, may2, june2, july2, august2, september2, october2, november2, december2];
                var data = myChartData.config.data;
                data.datasets[0].data = chart_data;
                data.labels = chart_labels;
                myChartData.update();
                });

                var list = <?php echo json_encode($listtopbook); ?>

                var listbook = Object.entries(list)
                for (i = 0; i < (listbook.length - 1); i++){
                    for (j = i + 1; j < listbook.length ; j++){
                        if (listbook[i][1] < listbook[j][1]){
                            var tmp = listbook[j];
                            listbook[j] = listbook[i];
                            listbook[i] = tmp;
                        }
                    }
                }
                var chart_labels2 = []
                var chart_data2 = []
                for( i = 0 ; i<5 && i<listbook.length ; i++){
                    chart_labels2.push("idbook:"+ listbook[i][0])
                    chart_data2.push(listbook[i][1])
                }

                var ctx = document.getElementById("CountryChart").getContext("2d");

                var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

                gradientStroke.addColorStop(1, 'rgba(29,140,248,0.2)');
                gradientStroke.addColorStop(0.4, 'rgba(29,140,248,0.0)');
                gradientStroke.addColorStop(0, 'rgba(29,140,248,0)'); //blue colors


                var config2 = {
                type: 'bar',
                responsive: true,
                legend: {
                    display: false
                },
                data: {
                    labels: chart_labels2,
                    datasets: [{
                    label: "Countries",
                    fill: true,
                    backgroundColor: gradientStroke,
                    hoverBackgroundColor: gradientStroke,
                    borderColor: '#1f8ef1',
                    borderWidth: 2,
                    borderDash: [],
                    borderDashOffset: 0.0,
                    data: chart_data2,
                    }]
                },
                options: gradientBarChartConfiguration
                };
                var myChart = new Chart(ctx,config2);
                $("#3").click(function() {
                var data = myChart.config.data;
                data.datasets[0].data = chart_data2;
                data.labels = chart_labels2;
                myChart.update();
                });
                $("#4").click(function() {
                var list1 = <?php echo json_encode($listtopbook1); ?>

                var listbook1 = Object.entries(list1)
                for (i = 0; i < (listbook1.length - 1); i++){
                    for (j = i + 1; j < listbook1.length ; j++){
                        if (listbook1[i][1] < listbook1[j][1]){
                            var tmp = listbook1[j];
                            listbook1[j] = listbook1[i];
                            listbook1[i] = tmp;
                        }
                    }
                }
                var chart_labels2 = []
                var chart_data2 = []
                for( i = 0 ; i<5 && i<listbook1.length ; i++){
                    chart_labels2.push("idbook:"+ listbook1[i][0])
                    chart_data2.push(listbook1[i][1])
                }
                var data = myChart.config.data;
                data.datasets[0].data = chart_data2;
                data.labels = chart_labels2;
                myChart.update();
                });

                $("#5").click(function() {
                var list2 = <?php echo json_encode($listtopbook2); ?>

                var listbook2 = Object.entries(list2)
                for (i = 0; i < (listbook2.length - 1); i++){
                    for (j = i + 1; j < listbook2.length ; j++){
                        if (listbook2[i][1] < listbook2[j][1]){
                            var tmp = listbook2[j];
                            listbook2[j] = listbook2[i];
                            listbook2[i] = tmp;
                        }
                    }
                }
                var chart_labels2 = []
                var chart_data2 = []
                for( i = 0 ; i<5 && i<listbook2.length ; i++){
                    chart_labels2.push("idbook:"+ listbook2[i][0])
                    chart_data2.push(listbook2[i][1])
                }
                var data = myChart.config.data;
                data.datasets[0].data = chart_data2;
                data.labels = chart_labels2;
                myChart.update();
                });

            },
        }
        $(document).ready(function() {
            mychart.initDashboardPageCharts();
        });
    </script>
@endpush
