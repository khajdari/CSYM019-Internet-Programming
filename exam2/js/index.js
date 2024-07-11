let selectedProgramIdsForReporting = [];

/*
	Add onDelete callback in order to prevent the default browser behavior and make
	the action cancelable
*/
const onDelete = (e) => {
	e.preventDefault();
	const el = e.target;
	const confirmDelete = confirm("Are you sure you want to delete?");
	if(confirmDelete) {
		const deleteForm = el.closest('form');
		deleteForm?.submit();
	}
}
/*
	use javascript DOM manipulation API in order to ADD fee dynamically
	without any page refresh
*/
const addOneFee = (event) => {
	const elWrapper = event.target;
	const replicateWrapper = elWrapper.closest('.replicate-rows-wrapper');
	const counter = +replicateWrapper.dataset.counter;
	replicateWrapper.dataset.counter = (counter + 1).toString();
	replicateWrapper.insertAdjacentHTML('beforeend', `
	<div class="row g-3 item-row">
                    <div class="col-auto">
                        <label>Location</label>
                        <input name="fees[${counter + 1}][location]" type="text" class="form-control" placeholder="Leave empty for remote">
                    </div>
                    <div class="col-auto">
                        <label>Duration</label>
                        <select name="fees[${counter + 1}][duration]" class="form-control">
                            <option value="full_time">Full Time</option>
                            <option value="part_time">Part Time</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <label>Pounds</label>
                        <input name="fees[${counter + 1}][pounds]" type="number" class="form-control" placeholder="Pounds">
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary add-new-btn fa-solid fa-plus" onclick="addOneFee(event)">
                        </button>
                    </div>
                </div>
	`);
};

/*
	use javascript DOM manipulation API in order to ADD social media option dynamically
	without any page refresh
*/
const addOneSocialMedia = (event) => {
	const elWrapper = event.target;
	const replicateWrapper = elWrapper.closest('.replicate-rows-wrapper');
	const row = replicateWrapper.children[0];
	replicateWrapper.insertAdjacentHTML('beforeend', row.outerHTML);
};
/*
	use javascript DOM manipulation API in order to ADD requirement dynamically
	without any page refresh
*/
const addRequirement = (event) => {
	const elWrapper = event.target;
	const replicateWrapper = elWrapper.closest('.replicate-rows-wrapper');
	const row = replicateWrapper.children[0];
	replicateWrapper.insertAdjacentHTML('beforeend', row.outerHTML);
};
/*
	use javascript DOM manipulation API in order to ADD FAQ dynamically
	without any page refresh
*/
const addOneFaq = (event) => {
	const elWrapper = event.target;
	const replicateWrapper = elWrapper.closest('.replicate-rows-wrapper');
	const counter = +replicateWrapper.dataset.counter;
	replicateWrapper.dataset.counter = (counter + 1).toString();
	replicateWrapper.insertAdjacentHTML('beforeend', `
	<div class="row g-3 item-row">
	  <div class="col-auto">
		  <label>FAQ</label>
		  <input name="faqs[${counter + 1}][question]" type="text" class="form-control" required>
	  </div>
	  <div class="col-auto">
		  <label>Answer</label>
		  <textarea name="faqs[${counter + 1}][answer]"  class="form-control"  required></textarea>
	  </div>
	  <div class="col-auto">
		  <div class="col-auto">
			  <label></label>
			  <button type="button" class="btn btn-primary add-new-btn fa-solid fa-plus" onclick="addOneFaq(event)">
			  </button>
		  </div>
	  </div>
	  </div>           
	`);
};

/*
	prepare program submission data before browser redirection.
*/
const onCreateProgramSubmit = (event) => {
	event.preventDefault();
	const form = document.getElementById('create-program-form');
	const socialMediaObj = {};
	const socialMediaWrapper = document.querySelector('.replicate-rows-wrapper');
	const socialInfoInput = document.querySelector('input.social_info');
	[...socialMediaWrapper.children].forEach(child => {
		const socialMediaName = child.querySelector('select[name="socialMediaName"]')?.value;
		const socialMediaLink = child.querySelector('input[name="socialMediaLink"]')?.value;
		if(!!socialMediaLink) {
			socialMediaObj[socialMediaName] = socialMediaLink;
		}
	});
	socialInfoInput.value = JSON.stringify(socialMediaObj);
	const modules = Array.from(form.querySelectorAll('input:checked[name="modules[]"]'));
	if(!modules.length) {
		alert('At least 1 module is required');
		return;
	}
	form.submit();
}
/*
	prepare user submission data before browser redirection.
	Also supports password validation logic
*/
const onCreateUserSubmit = (event) => {
	event.preventDefault();
	const form = event.target.closest('form');
	const errorEl = document.querySelector('.alert-danger');
	const password = document.querySelector('input[name="password"]');
	const passwordRepeat = document.querySelector('input[name="password_repeat"]');

	if(password.value.trim() !== passwordRepeat.value.trim()) {
		errorEl.removeAttribute("hidden");

	}else {
		errorEl.setAttribute("hidden", '');
		form.submit();
	}

}

const checkAllCheckboxState = () => {
	const selectAllCheckbox = document.getElementById('select-all-checkboxes');
	const allCheckboxesFromRows = document.querySelectorAll('table tbody input.select-for-report');

	let checkedState = true;
	allCheckboxesFromRows.forEach(checkbox => {
		if(!checkbox.checked) {
			checkedState = false;
			return
		}
	})
	selectAllCheckbox.checked = checkedState;
};
/*
	Support dynamic functionality for `Add all` programs  checkbox.
*/
const onProgramCheckboxTrigger = (programId) => {
	selectedProgramIdsForReporting =
		selectedProgramIdsForReporting.includes(programId)
		? selectedProgramIdsForReporting.filter(i => i !== programId)
		: [...selectedProgramIdsForReporting, programId];

	const generateReportLink = document.getElementById('generate-report-btn');

	if(selectedProgramIdsForReporting.length === 0) {
		generateReportLink.style.display = 'none';
	}else {
		generateReportLink.style.display = 'inline';
	}
	generateReportLink.querySelector('.badge').innerHTML = selectedProgramIdsForReporting.length || '';
	generateReportLink.setAttribute(
		'href',
			'create-report.php'+ (selectedProgramIdsForReporting.length > 0
				? `?programIds[]=${selectedProgramIdsForReporting.join('&programIds[]=')}`
				: '')
		)

	checkAllCheckboxState();
}

const onAllCheckboxesClicked = (event) => {
	const clickEvent = event || window.event;
	const isAllChecked = clickEvent.target.checked;
	const allRowsCheckboxes = [...event.target.closest('table').querySelector('tbody').querySelectorAll('input[type="checkbox"]')];
	allRowsCheckboxes.forEach(checkbox => {
		if(isAllChecked && !checkbox.checked || !isAllChecked && checkbox.checked) {
			checkbox.click();
		}
	});

}