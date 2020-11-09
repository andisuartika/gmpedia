<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Tambah User
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <label for="roles_id">Roles</label>
                            <select class="form-control" id="roles_id" name="roles_id">
                                <option value=1>Admin</option>
                                <option value=1>Member</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right"> Tambah Data </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>