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
					{{ csrf_field() }}
                        <input type="text" name="fname" id="fname" placeholder=" First Name"></br>
						@error('fname')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
                        <input type="text" name="lname" id="lname" placeholder=" Last Name"></br>
						@error('lname')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
                        <button type="submit" value="Insert">Insert</button>
                    </form>
                </div>
                <div class="form-wrapper">
                    <h3>Update</h3>
                    <form action="{{ route('update') }}" method="post">
					 {{ csrf_field() }}
					<input type="text" name="id" id="id" placeholder="Id"></br>
					@error('id')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror
                    <select name="choose-name" id="" style="width:88%">
                            <option value="">Choose Name</option>
                            <option value="fname">First Name</option>
                            <option value="lname">Last Name</option>
                    </select>
					@error('choose-name')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror
                    <input type="text" name="update-value" id="update-value" placeholder=" New Value">
					@error('update-value')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror
					</br>
                        <button type="submit" value="Update">Update</button>
                    </form>
                </div>
                <div class="form-wrapper">
                    <h3>Delete</h3>
                    <form action="{{ route('delete') }}" method="post">
						{{csrf_field()}}
                        <input type="text" name="delete-id" id="id" placeholder=" Id"></br>
						@error('delete-id')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
                        <button type="submit" value="Delete">Delete</button>
                    </form>
                </div>
            </div>
            <div id="right-panel">
            <table>
                <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                </tr>
                @foreach ($results as $result)
                <tr>
					<td>{{ $result->id }}</td>
					<td>{{ $result->fname }}</td>
					<td>{{ $result->lname }}</td>
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
