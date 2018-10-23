(function(window) {
	
	if (document.querySelector('form.js-register')) {
		document.querySelector('form.js-register').addEventListener('submit', (e) => {
			e.preventDefault();
			// DOM
			const $form = e.target || e.srcElement;
			const $error = $form.querySelector('.js-error');
			// clear error message & hide error on submit
			if ( !$error.classList.contains('hide') ) {
				$error.innerHTML = '';
				$error.classList.add('hide');
			}
			// submitted input data
			const data = {
				email    : $form.querySelector('input[type=email]').value,
				password : $form.querySelector('input[type=password]').value,
			};
			// Email validation
			const emailRegex = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
			if ( !data.email || !emailRegex.test(data.email) ) {
				const $msgEl = createElementWithText('Please enter a valid email address.');
				$error.appendChild($msgEl);
				if ( $error.classList.contains('hide') ) {
					$error.classList.remove('hide');
				}
				return false;
			}
			// Password validation
			if ( !data.password || data.password.length < 8 ) {
				const $msgEl = createElementWithText('Password must be at least 8 characters long.');
				$error.appendChild($msgEl);
				if ( $error.classList.contains('hide') ) {
					$error.classList.remove('hide');
				}
				return false;
			}
			console.log(data);
			
			// if email & password valid, send the data to the server using the fetch api
			postData(`php-login-registration/api/register.php`, data)
			.then(resp => {
				console.log(JSON.stringify(resp));
				if (resp.redirect) {
					return window.location = resp.redirect;
				}
			})
			.catch(error => console.error(error));
			
			return false;
		}, false);
	}
	
})(window);

/**
 * Create an HTML element with given text
 * @param text
 * @param el [optional - default p tag]
 * @returns {HTMLElement}
 */
const createElementWithText = (text, el = 'p') => {
	const $el = document.createElement(el);
	const $text = document.createTextNode(text);
	$el.appendChild($text);
	return $el;
};

/**
 * Fetch API - POST helper
 * @param url
 * @param data
 * @returns {Promise<Response | never>}
 */
const postData = async (url = ``, data = {}) => {
	// Default options are marked with *
	return await fetch(url, {
		method: "POST", // *GET, POST, PUT, DELETE, etc.
		mode: "cors", // no-cors, cors, *same-origin
		cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
		credentials: "same-origin", // include, same-origin, *omit
		headers: {
			"Content-Type": "application/json; charset=utf-8",
			// "Content-Type": "application/x-www-form-urlencoded",
		},
		redirect: "follow", // manual, *follow, error
		referrer: "no-referrer", // no-referrer, *client
		body: JSON.stringify(data), // body data type must match "Content-Type" header
	})
	.then(response => response.json()); // parses response to JSON
};