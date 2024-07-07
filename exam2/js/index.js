const onDelete = (e) => {
	const el = e.target;
	const confirmDelete = confirm("Are you sure you want to delete?");
	if(confirmDelete) {
		const deleteForm = el.parentElement;
		deleteForm?.submit();
	}
}

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
                        <label>Type</label>
                        <select name="fees[${counter + 1}][type]" class="form-control">
                            <option value="full-time">Full Time</option>
                            <option value="part-time">Part Time</option>
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


const addOneSocialMedia = (event) => {
	const elWrapper = event.target;
	const replicateWrapper = elWrapper.closest('.replicate-rows-wrapper');
	const row = replicateWrapper.children[0];
	replicateWrapper.insertAdjacentHTML('beforeend', row.outerHTML);
};

const addRequirement = (event) => {
	const elWrapper = event.target;
	const replicateWrapper = elWrapper.closest('.replicate-rows-wrapper');
	const row = replicateWrapper.children[0];
	replicateWrapper.insertAdjacentHTML('beforeend', row.outerHTML);
};

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



const onCreateProgramSubmit = (event) => {
	event.preventDefault();
	const form = document.getElementById('create-program-form');
	const socialMediaObj = {};
	const socialMediaWrapper = document.querySelector('.replicate-rows-wrapper');
	const socialInfoInput = document.querySelector('input.social_info');
	[...socialMediaWrapper.children].forEach(child => {
		const socialMediaName = child.querySelector('input[name="socialMediaName"]')?.value;
		const socialMediaLink = child.querySelector('input[name="socialMediaLink"]')?.value;
		socialMediaObj[socialMediaName] = socialMediaLink;
	});
	socialInfoInput.value = JSON.stringify(socialMediaObj);

	form.submit();
}

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