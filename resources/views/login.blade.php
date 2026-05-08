<!DOCTYPE html>
<html>
<head>

    <title>Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-4">

            <div class="card p-4 shadow">

                <h3 class="mb-4">Admin Login</h3>

                <form action="/admin/login" method="POST">

                    @csrf

                    <input
                        type="email"
                        name="email"
                        class="form-control mb-3"
                        placeholder="Enter Email"
                    >

                    <input
                        type="password"
                        name="password"
                        class="form-control mb-3"
                        placeholder="Enter Password"
                    >

                    <button class="btn btn-dark w-100">

                        Login

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>