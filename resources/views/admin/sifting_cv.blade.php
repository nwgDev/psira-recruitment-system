@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2 style="margin-bottom: 50px;">Sifting of CV's</h2>

        <form action="{{ route('admin.sifting.cv') }}" method="GET" id="siftingForm">
            @csrf

            <div class="row just">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Select Post:</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select name="post_id" id="post_id" class="form-control" required>
                            <option value="">Select Post</option>
                            @foreach($posts as $post)
                                <option value="{{ $post->id }}">{{ $post->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="closing_date">Closing Date:</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="closing_date" id="closing_date" class="form-control" readonly>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="manager_email">Manager Email:</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="email" name="manager_email" id="manager_email" class="form-control" readonly>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="job_description">Job Description:</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="job_description" id="job_description" class="form-control" readonly rows="4"></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="job_description">Summary Sifting:</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <span id="summary_sifting"></span>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <h4>Applicants for the Position</h4>
                        <table class="table1">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Province</th>
                                <th>Drivers Lic</th>
                                <th>Qualification</th>
                                <th>Experience</th>
                                <th>Total Points</th>
                                <th>Meet Requirements</th>
                                <th>Review CV</th>
                            </tr>
                            </thead>
                            <tbody id="applicantTable">
                            <!-- Applicant rows will be dynamically added here -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <button type="submit" class="btn1">Email Manager</button>
                        <button type="button" class="btn1" id="printPdfBtn">Print to PDF</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="button" class="btn1">Exit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/sifting.js') }}"></script>

@endsection
