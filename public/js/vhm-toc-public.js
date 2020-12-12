'use strict';

// Select the list wrapper element
const vhmTocWrapper = document.querySelector("#vhm-toc");
// Select the list
const vhmTocList = vhmTocWrapper.querySelector("ol");
// Select the elements from which we will create the table of content
const vhmTocElements = document.querySelectorAll(options.elementList);

// If the wrapper element exists and there are elements
if (vhmTocWrapper && vhmTocElements.length > 0) {
	// Run through the post elements to create the table of content
	vhmTocElements.forEach(function(element, index) {
		// Add and ID to the element
		element.id = `section-${index}`;

		// Add the HTML to append to the list and an anchor link it to the element
		vhmTocList.innerHTML += `<li class="${options.elementItems}"><a href="#section-${index}">${element.innerHTML}</a></li>`;
	});
	// Show the wrapper
	vhmTocWrapper.style.display = 'block';
}