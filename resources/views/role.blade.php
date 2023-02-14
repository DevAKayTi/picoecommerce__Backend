<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }   
    </style>
</head>
<body>
    <a href="{{route('roles.create')}}">create</a>
    <section>
        <table style="width:500px">
            <tr style="width:100%;text-align:left">
                <th>
                    roles
                </th>
                <th>
                    action
                </th>
            </tr>
            @foreach($rolename as $name)
            <tr style="width:100%">
                <td>{{$name->name}}</td>
                <td>
                    <a href="{{route('roles.edit',$name->id)}}" style="float:left;margin-right:10px;">edit</a>
                    <form action="{{route('roles.destroy',$name->id)}}" method="POST"> 
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>

                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </section>
</body>
</html>