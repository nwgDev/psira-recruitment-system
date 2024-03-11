document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('post_id').addEventListener('change', function() {
        var postId = this.value;

        if (postId) {
            fetch(`/sifting-cv/posts/${postId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('closing_date').value = data.closing_date;
                    document.getElementById('manager_email').value = data.manager_email;
                    document.getElementById('job_description').value = data.job_description;

                    const totalPoints       = calculateTotalPoints(data);
                    const meetRequirements  = Math.floor(totalPoints / 6);

                    calculateSummary(data, meetRequirements);

                    const applicantTable = document.getElementById('applicantTable');

                    applicantTable.innerHTML = '';

                    data.applicants.forEach(applicant => {

                        const row                   = document.createElement('tr');
                        const applicantTotalPoints  = calculateApplicantTotalPoints(applicant, data.qualification_id, data.required_experience_in_years);
                        const cvFileName            = applicant.user.cv_link ? applicant.user.cv_link.replace(/\s/g, '%20') : '';
                        const cvLink                = `/storage/${cvFileName}`;

                        row.innerHTML = `
                            <td> ${applicant.user.name} </td>
                            <td> ${applicant.user.surname} </td>
                            <td> ${applicant.user.province.name} </td>
                            <td> ${applicant.drivers_license === 'Yes' ? 2 : 0} </td>
                            <td> ${(applicant.qualification_id >=  data.qualification_id) ? 2 : 0 } </td>
                            <td> ${(applicant.total_experience_in_years >= data.required_experience_in_years) ? 2 : 0} </td>
                            <td> ${applicantTotalPoints} </td>
                            <td> ${applicantTotalPoints === 6 ? 'Yes' : 'No'} </td>
                            <td><a href="${cvLink}" target="_blank">Review CV</a></td>`;

                        applicantTable.appendChild(row);
                    });
                })
        }
    });

    function calculateSummary(data) {
        const candidatesApplied = parseInt(data.applicants_count) || 0;
        let meetRequirementsCount = 0;

        data.applicants.forEach(applicant => {
            const applicantTotalPoints = calculateApplicantTotalPoints(applicant, data.qualification_id, data.required_experience_in_years);
            if (applicantTotalPoints === 6) {
                meetRequirementsCount++;
            }
        });

        const summary = `+${candidatesApplied} candidate(s) applied for the position\n+ ${meetRequirementsCount} Candidate(s) meet(s) the requirements`;
        const summarySiftingElement = document.getElementById('summary_sifting');

        if (summarySiftingElement) {
            summarySiftingElement.innerText = summary;
        } else {
            console.error("Element with ID 'summary_sifting' not found.");
        }
    }

    function calculateTotalPoints(data) {
        let totalPoints = 0;

        data.applicants.forEach(applicant => {
            const driverLicense                 = applicant.drivers_license;
            const applicantQualificationName    = applicant.qualification_id;
            const totalExperience               = applicant.total_experience_in_years;

            if (driverLicense === 'Yes') {
                totalPoints += 2;
            }

            if (applicantQualificationName >= data.qualification_id) {
                totalPoints += 2;
            }

            if (totalExperience >= data.required_experience_in_years) {
                totalPoints += 2;
            }
        });

        return totalPoints;
    }

    function calculateApplicantTotalPoints(applicant, required_qualification, required_experience_in_years) {
        let applicantTotalPoints = 0;

        if (applicant.qualification_id >= required_qualification) {
            applicantTotalPoints += 2;
        }

        if (applicant.drivers_license === 'Yes') {
            applicantTotalPoints += 2;
        }

        if (applicant.total_experience_in_years >= required_experience_in_years) {
            applicantTotalPoints += 2;
        }

        return applicantTotalPoints;
    }

    document.getElementById('printPdfBtn').addEventListener('click', function() {
        window.print();
    });
});
