<div class="px-2 mb-4" style="overflow: hidden">
    <div class="row justify-content-center">
        <div class="col-sm-4">
            <div class="form-group position-relative mb-4">
                <input type="text" 
                   wire:model="search" 
                   class="form-control" 
                   placeholder="Search to join a group todo">
                <div class=" bg-white shadow-md rounded-bottom p-3 mt-1" style="width:100%">

                    @foreach ($groupname as $item)
                        <div class="d-flex justify-content-between">
                            <h3 class="">
                                {{$item->gname}}
                            </h3> 
                            <a href="{{route('join', $item->id)}}" class="text-decoration-none">
                                Join
                            </a>
                        </div>   
                    @endforeach
                
                </div> 
            </div>
            
                
        </div>
    </div>

    
      
</div>
