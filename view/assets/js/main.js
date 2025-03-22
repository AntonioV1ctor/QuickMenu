function redirect_with_param(page, param_name, value) {
    window.location.href = page + '?' + param_name + '=' + value;
    console.log('Redirecting...');
}