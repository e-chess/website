document.querySelector('#notificationbutton').addEventListener('click', ev => {
    ev.preventDefault();
	if (!('Notification' in window)) {
		throw new Error('Der Browser unterstützt keine Benachrichtigungen.');
		return;
	}
	const ask = Notification.requestPermission(permission => {
		if (permission !== 'granted') {
			alert('Keine Erlaubnis zum Anzeigen von Benachrichtigungen!');
			return;
		}
		const txt = document.querySelector('textarea').value;
		if (txt.match(/^\W*$/)) {
			alert('Bitte geben Sie Text ein.');
			return;
		}
		setTimeout(() => {
			const msg = new Notification('Test-Nachricht', {
				body: txt,
				lang: 'de',
				icon: '../img/logo.svg',
				image: '../img/logo.svg'
			});
			msg.onclick = ev => alert('Sie haben die Nachricht angeklickt!');
			msg.onerror = err => console.error(err);
			msg.onshow = ev => console.info(ev);
			msg.onclose = ev => console.info(ev);
		}, 1000);
	});
}); 