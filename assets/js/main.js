(function(window) {
	
	document.querySelector('form.js-register').addEventListener('submit', (e) => {
		e.preventDefault();
		// DOM
		const $form = e.target || e.srcElement;
		const $error = $form.querySelector('.js-error');
		// clear error message & hide error on submit
		if (!$error.classList.contains('hide')) {
			$error.innerHTML = '';
			$error.classList.add('hide');
		}
		// submitted input data
		const data = {
			email: $form.querySelector('input[type=email]').value,
			password: $form.querySelector('input[type=password]').value,
		};
		// Email validation
		const emailRegex = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		if (!data.email || !emailRegex.test(data.email)) {
			const $msgEl = createElementWithText('Please enter a valid email address.');
			$error.appendChild($msgEl);
			if ($error.classList.contains('hide')) {
				$error.classList.remove('hide');
			}
			return false;
		}
		// Password validation
		if (!data.password || data.password.length < 8) {
			const $msgEl = createElementWithText('Password must be at least 8 characters long.');
			$error.appendChild($msgEl);
			if ($error.classList.contains('hide')) {
				$error.classList.remove('hide');
			}
			return false;
		}
		console.log(data);
		// if email & password valid, send the data to the server using the fetch api

		
		return false;
	}, false);
	
})(window);


const createElementWithText = (text = '', el = 'p') => {
	const $el = document.createElement(el);
	const $text = document.createTextNode(text);
	$el.appendChild($text);
	return $el;
};