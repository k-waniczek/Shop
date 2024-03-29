$(() => {
	//Validating holidays form
    $("form").submit((e) => {
        let arr = [];
        $("form .date select").each(function () {
            arr.push($(this).val());
        })

        let start = new Date(arr.slice(0, 3).join('-'));
        let end = new Date(arr.slice(3, 6).join('-'));
        if (+$("#holidays span").text() < getBusinessDatesCount(start, end)) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                text: `
                	${lang.you_have_only}
                	${+$("#holidays span").text()}
                	${lang.days_left}
                	${getBusinessDatesCount(start, end)}
                !`,
                showConfirmButton: true,
                timer: 5000,
                timerProgressBar: true
            });
        }
    })
});
