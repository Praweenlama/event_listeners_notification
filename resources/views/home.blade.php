@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Title</th>
                            <th class="text-center">Body</th>
                        </tr>
                    </thead>
                    <tbody class="table">
                    </tbody>
                </table>
            </div>

            <div class="card p-2 mt-2">
                <form action="{{route('post.store')}}" method="POST">
                    @csrf
                    <div class="form-group p-2">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" id="">
                    </div>
                    
                    <div class="form-group p-2">
                        <label for="">Body</label>
                        <input type="text" class="form-control" name="body" id="">
                    </div>

                    <div class="p-2">
                        <button class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const url = '/all_posts';
    let getAllPosts = async () => {
        const response = await fetch(url, {
            method: 'GET',
            headers: {
                'Content-Type' : 'application/json'
            }
        });

        const datas = await response.json();
        
        let table = '';

        datas.map((data) => {
            // console.log(data.title)
            table+=`<tr>
                        <td class="text-center">${data.title}</td>
                        <td class="text-center">${data.body}</td>
                    </tr>`;
        })
        document.querySelector('.table').innerHTML=table;
    }
    getAllPosts();
</script>
@endsection
