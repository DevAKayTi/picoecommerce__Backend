<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>rolename
        <form action="{{route('roles.update',$roleupdate->id)}}" method="POST" >
            @csrf
            @method('PUT')
            <div>
                <label for="rolename">Role Name</label>
                <input type="text" name="rolename" value="{{$roleupdate->name}}"/>
            </div>
            <div>
                <h4>Permission</h4>
                <div>
                    <h5>User</h5>
                    <div>
                    <input type="checkbox" id="ViewUser" name="feature[]" value=1 >
                    <label for="ViewUser"> View User</label><br>
                    <input type="checkbox" id="AddUser" name="feature[]" value=2 >
                    <label for="AddUser"> Add User</label><br>
                    <input type="checkbox" id="EditUser" name="feature[]" value=3 >
                    <label for="EditUser"> Edit User</label><br/>
                    <input type="checkbox" id="DeleteUser" name="feature[]" value=4 >
                    <label for="DeleteUser"> Delete User</label>
                    </div>
                </div>
                <div>
                    <h5>Role</h5>
                    <div>
                    <input type="checkbox" id="ViewRole" name="feature[]" value=5>
                    <label for="ViewRole"> View Role</label><br>
                    <input type="checkbox" id="AddRole" name="feature[]" value=6>
                    <label for="AddRole"> Add Role</label><br>
                    <input type="checkbox" id="EditRole" name="feature[]" value=7>
                    <label for="EditRole"> Edit Role</label><br/>
                    <input type="checkbox" id="DeleteRole" name="feature[]" value=8>
                    <label for="DeleteUser"> Delete Role</label>
                    </div>
                </div>
            </div>
            <input type="submit">
        </form>
        
    </section>
</body>
</html>