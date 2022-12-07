import '../scss/app.scss'

// import gsap
import {
	gsap
} from 'gsap'

// scroll specific
import {
	ScrollTrigger
} from 'gsap/ScrollTrigger'

import {
	ScrollToPlugin
} from 'gsap/ScrollToPlugin'

gsap.registerPlugin(ScrollTrigger, ScrollToPlugin)

const vh = (coef) => window.innerHeight * (coef/100)
const vw = (coef) => window.innerWidth * (coef/100)

// tabs
const tab = document.getElementsByClassName('tab')
const tabContent = document.getElementsByClassName('tab-content')

// wait until DOM is ready
const initApp = () => {

	// tabs
	const ifTabs = document.getElementsByClassName('tabs');
		if (ifTabs.length > 0) {

		hideTabsContent(1)
		tab[0].classList.add('active')
		tabContent[0].classList.add('show')

		document.getElementById('tabs').onclick= function (event) {
			var target=event.target;
			if (target.className=='tab') {
				for (var i=0; i<tab.length; i++) {
					if (target == tab[i]) {
						showTabsContent(i)
						break;
					}
				}
			}
		}

		function hideTabsContent(a) {
			for (var i=a; i<tabContent.length; i++) {
				tabContent[i].classList.remove('show')
				tabContent[i].classList.add("hide")
				tab[i].classList.remove('active')
			}
		}

		function showTabsContent(b){
			if (tabContent[b].classList.contains('hide')) {
				hideTabsContent(0)
				tab[b].classList.add('active')
				tabContent[b].classList.remove('hide')
				tabContent[b].classList.add('show')
			}
		}
	}

	// scroll element with GSAP
	const ifStatsImage = document.getElementsByClassName('stats');
		if (ifStatsImage.length > 0) {

		gsap.to('.stats .image-holder img', {
			y: 0,
			scrollTrigger: {
				trigger: '.stats',
				start: 'top 180',
				// end: 'center 50%',
				scrub: true
			}
		})
	}

	const ifTextImageCTA = document.getElementsByClassName('text-image-cta');
		if (ifTextImageCTA.length > 0) {

		gsap.to('.text-image-cta .image-holder img', {
			y: 0,
			scrollTrigger: {
				trigger: '.text-image-cta',
				start: 'top 50%',
				// end: 'center 50%',
				scrub: true
			}
		})
	}

	const ifAdvertiseImage = document.getElementsByClassName('advertise');
		if (ifAdvertiseImage.length > 0) {

		gsap.to('.advertise .image-holder img', {
			y: 0,
			scrollTrigger: {
				trigger: '.advertise',
				start: 'top 50%',
				// end: 'center 50%',
				scrub: true
			}
		})
	}

	const ifBenefitsSlider = document.getElementsByClassName('benefits-slider');
		if (ifBenefitsSlider.length > 0) {

		const benefits = document.querySelector('.benefits-slider .benefits')
		const benefitsWidth = benefits.clientWidth - 1200

		gsap.to('.benefits-slider .benefits', {
			x: - benefitsWidth,
			scrollTrigger: {
				trigger: '.benefits-slider .benefits',
				start: 'top 25%',
				end: 'bottom 50%',
				scrub: 1
			}
		})
	}

}
document.addEventListener('DOMContentLoaded', initApp)
