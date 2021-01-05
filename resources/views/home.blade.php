<x-master>
    <!-- livewire search to join a groupTodo -->
    @forelse ($groupName as $item)
        @if ($item->owner == 'Admin')
           {{__('')}}
        @endif
    @empty
        @if ($outs == 'hello')
            @livewire('searchgrouptodo')
        @else
            {{__('')}}
        @endif
        
    @endforelse
    <!-- end -->    
    
    <!-- A create personal todo and group todo -->
        @include('pages.create')
    <!-- end -->

    <div class="container mt-5">

        <!--Personal todo-list -->
            <x-personal-todolistc :personals=$personals />
        <!-- end of personal todo-list tag -->

        <!-- group todo-list ownere -->
            <x-group-ownerlist :groupName=$groupName :groupTodo=$groupTodo :outs=$outs :lists=$lists />
        <!-- end of owner -->
           

        <!-- group join list -->
            <x-group-joinlist :outs=$outs :looks=$looks :takes=$takes />
        <!-- end of join -->                
        

        <!-- personal input -->

        @include('pages.personal-todolist')
        
        <!-- group todo-list modal -->

            <!-- modal-->
                    
            <x-group-todolist :lists=$lists />

        <!-- end of group todo-list modal-->
       

    </div>


</x-master>