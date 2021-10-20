@if (session()->has('message'))

    <div class="alert alert-success alert-dismissible fade show" role="alert" >
        <strong>{{session()->get('message')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session()->has('error'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{session()->get('error')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif

@if ($errors->any())


    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>




@endif

@if (session()->has('reservation'))

    <div class="alert alert-success alert-dismissible fade show fixed-bottom" role="alert" >
        <strong>{{session()->get('reservation')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif



