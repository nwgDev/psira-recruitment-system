{{ dd($post) }}
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h5>Name: {{ $post->name }}</h5>
            <p>Job Description: {{ $post->job_description }}</p>
            <p>Business Unit: {{ $post->business_unit }}</p>
            <p>Manager Name: {{ $post->manager_name }}</p>
            <p>Manager Email: {{ $post->manager_email }}</p>
        </div>
        <div class="col-md-6">
            <p>Years Required: {{ $post->years_required }}</p>
            <p>Qualification ID: {{ $post->qualification_id }}</p>
            <p>Driver's License: {{ $post->drivers_license }}</p>
            <p>Opening Date: {{ $post->opening_date }}</p>
            <p>Closing Date: {{ $post->closing_date }}</p>
        </div>
    </div>
</div>
