<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
				body {
						font-family: 'Nunito', sans-serif;
					}
                #wrapper {
                    width:95%;
                    margin:30px auto;
                    border:1px solid #cccccc;
                    padding:10px;
                    overflow: hidden;
                }
                #left-panel {
                    border:1px solid #cccccc;
                    width:200px;
                    padding0 10px 10px 10px;
                    float: left;
                }
                #right-panel {
                    border:1px solid #cccccc;
                    width:1050px;
                    float: right;
                }
                table {
					font-family: arial, sans-serif;
					border-collapse: collapse;
					width: 100%;
				}
				td, th {
				  border: 1px solid #dddddd;
				  text-align: left;
				  padding: 8px;
				}

				tr:nth-child(even) {
				  background-color: #dddddd;
				}
				.alert-danger{
					color:red;
				}
        </style>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    </head>
    <body class="antialiased">

        <div id="wrapper">
            <div id="left-panel">
                <div class="form-wrapper">
                    <h3>Insert</h3>
                    <form action="{{ route('insert') }}" method="post">
                            @csrf

                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <input type="submit" value="Submit">
                    </form>
                </div>
                <div class="form-wrapper">
                    <h3>Update</h3>
					 <form method="POST" action="{{ route('update') }}">
                        @csrf
                        @method('PATCH')
                        <label for="id">ID:</label>
                        <input type="number" id="id" name="update_id">
                        @error('update_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="update_name">
                        @error('update_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="update_email">
                        @error('update_email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <input type="submit" value="Update">
                    </form>
                </div>
                <div class="form-wrapper">
                    <h3>Delete</h3>
                    <form method="POST" action="{{ route('delete') }}">
                        @csrf
                        @method('DELETE')
                        <label for="id">ID:</label>
                        <input type="number" id="id" name="delete-id">
                        @error('delete-id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <input type="submit" value="Delete">
                    </form>

                </div>
            </div>
            <div id="right-panel">
            <table>
                <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                </tr>
                @foreach ($results as $result)
                <tr>
					<td>{{ $result->id }}</td>
					<td>{{ $result->name }}</td>
					<td>{{ $result->email }}</td>
                </tr>
                @endforeach
            </table>
            </div>
        </div>
		 <script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
		</script>
    </body>
</html>
