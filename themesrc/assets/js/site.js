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

// wait until DOM is ready
const initApp = () => {

	// header
	const headerMenu = gsap.timeline({
		scrollTrigger: {
			trigger: '.introduction',
			scrub: 0.25,
			start: 'center',
			end: 'bottom',
			onEnter: () => gsap.to('.header__outer', {
		    backgroundColor: 'rgb(6, 29, 39, 0)',
		    duration: .5
		  }),
		  onLeave: () => gsap.to('.header__outer', {
		    backgroundColor: 'rgb(6, 29, 39, .95)',
		    duration: .5
		  }),
			onEnterBack: () => gsap.to('.header__outer', {
        backgroundColor: 'rgb(6, 29, 39, 0)',
        duration: .5
      }),
		}
	});
	headerMenu.to(".header__outer", {y: "-22px"})

	// if buy
	// document.querySelectorAll('#to-buy').forEach((btn, index) => {
	//   btn.addEventListener('click', () => {
	//     gsap.to(window, {
	// 			duration: 1,
	// 			scrollTo:{
	// 				y: '#buy',
	// 				offsetY: 0
	// 			}
	// 		})
	//   })
	// })

	// tabs
	const ifTabs = document.getElementsByClassName('tab-content')
		if (ifTabs.length > 0) {

		// tabs
		const tab = document.getElementsByClassName('tab')
		const tabContent = document.getElementsByClassName('tab-content')

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
				tabContent[i].classList.add('hide')
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
		const benefitsWidthDesktop = benefits.clientWidth - 1200
		const benefitsWidthTablet = benefits.clientWidth

		ScrollTrigger.matchMedia({
			// large up
			"(min-width: 1025px)": function() {
				gsap.to('.benefits-slider .benefits', {
					x: - benefitsWidthDesktop,
					scrollTrigger: {
						trigger: '.benefits-slider .benefits',
						start: 'top 25%',
						end: 'bottom 50%',
						scrub: 1
					}
				})
			}
		})

		ScrollTrigger.matchMedia({
			// medium down
			"(max-width: 1024px)": function() {
				gsap.to('.benefits-slider .benefits', {
					x: '-32.5vw',
					scrollTrigger: {
						trigger: '.benefits-slider .benefits',
						start: 'top 50%',
						end: 'bottom 25%',
						scrub: 1
					}
				})
			}
		})

		ScrollTrigger.matchMedia({
			// small only
			"(max-width: 750px)": function() {
				gsap.to('.benefits-slider .benefits', {
					x: '0',
					scrollTrigger: {
						trigger: '.benefits-slider .benefits',
						start: 'top 50%',
						end: 'bottom 25%',
						scrub: 1
					}
				})
			}
		})
	}

	// menu
	let menuArrows = document.querySelectorAll('.menu__arrow')
	if (menuArrows.length > 0) {
		for (let index = 0; index < menuArrows.length; index++) {
			const menuArrow = menuArrows[index]
			menuArrow.addEventListener('click', function (e) {
				menuArrow.parentElement.classList.toggle('_active')
			})
		}
	}

	// < menu burger
	const iconMenu = document.querySelector('.menu__icon')
	const menuBody = document.querySelector('.nav--top')
	if (iconMenu) {
		iconMenu.addEventListener('click', function (e) {
			document.body.classList.toggle('lock')
			iconMenu.classList.toggle('_active')
			menuBody.classList.toggle('_active')
		})
	}

}
document.addEventListener('DOMContentLoaded', initApp)
