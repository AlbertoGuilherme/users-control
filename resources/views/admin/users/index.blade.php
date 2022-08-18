
@extends('admin.contacts.layouts.app')



@section('Index', 'Show all Users')

@section('contact')


<div class="card">


        <div class="card-header">

            @if (auth()->check())
            <div class="mr-2">


            </div>
            @else
                <p>You need to be logged in the quantity of authentications
                  <a href="{{route('login')}}">Login here</a>

                </p>
            @endif
            @include('admin.includes.alert')
            {{-- <form action="" method="post" class="form form-inline">
                @csrf
                <input type="text" name="filter"  class="form-control" placeholder="Name" value ="">
                 <button type="submit" class="btn btn-warning">search</button>
            </form> --}}
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>

                            <th>Name</th>

                            <th width="300">Numbers of Authentications</th>

                    </tr>
                </thead>

            <tbody>
                @foreach ($users as $user)
         <tr>
                    <td>
                        {{$user->name}}
                    </td>
                    @if (auth()->check())
                    <td style="width=10px;" >
                        {{-- <a  class="btn btn-info">Detalhes</a> --}}
                        {{-- <a href="{{ route('contacts.edit', $contact->id )}}" class="btn btn-success">edit</a>
                        <a href="{{ route('contacts.show', $contact->id )}}" class="btn btn-warning">Details</a> --}}

                          <a  class="btn btn-info">{{$user->counter}}</a>

                    </td>
                    @else
                <td>

                    <p>You need to be logged in the quantity of authentications</p>
                    <a href="{{route('login')}}">Login here</a>

                </td>



            </tbody>
            @endif
        </tr>
            @endforeach
            </table>
        </div>

        <div class="card-footer">

        </div>
    </div>


@endsection
