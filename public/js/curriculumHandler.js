function checkDeliveryTime(event, deliveryTime, alwaysAvailable) {
    const currentTime = new Date().getTime();
    let isAvailable = alwaysAvailable === 1;

    if (deliveryTime && !isAvailable) {
        const fromTime = new Date(deliveryTime.delivery_from).getTime();
        const toTime = new Date(deliveryTime.delivery_to).getTime();

        if (currentTime >= fromTime && currentTime <= toTime) {
            isAvailable = true;
        }
    }

    if (!isAvailable) {
        event.preventDefault();
        alert('このカリキュラムは現在ご利用いただけません。');
    }

    return isAvailable;
}