<x-app-layout>

    <div class="container">

        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div>
                    <div class="card-header">
                        <h3>Add a contact</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                        @endif
                    </div>
                    <div class="card-header">
                        <form method="post" action="{{ route('contacts.store') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control" name="first_name" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control" name="last_name" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" name="email" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="city">City:</label>
                                <input type="text" class="form-control" name="city" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="country">Country:</label>
                                <input type="text" class="form-control" name="country" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="job_title">Job Title:</label>
                                <input type="text" class="form-control" name="job_title" />
                            </div>
                            <button type="submit" class="btn btn-primary">Add contact</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
