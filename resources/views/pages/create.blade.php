<div class="container-fluid">
    <div class="d-flex align-items-center float-right mb-3">
        <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">
            Create a Todo-list
        </button>
        @if ($looks != "hello")
            {{__('')}}
        @else
            <button type="button" class="btn btn-info ml-2 btn-md" data-toggle="modal" data-target="#myModalgroup">
                Create a Group Todo-list
            </button>
        @endif
            
    </div>
</div>    