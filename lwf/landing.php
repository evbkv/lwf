<?php

/**
 *
 * View landing page class.
 *
 */

class view {

	// Header

	public static function header($lang) {
		$lang_n = 0;
		foreach (date::$LANG as $value) $lang_n = $lang_n + 1;
		echo '
			<header>
				<a name="top"></a>
				<div class="headerImage">
					<div class="wrapper">
						<a href=""><div class="logotype"></div></a>
						<nav>
							<ul>';
								$arr = array_keys(date::$SECTIONS);
								foreach ($arr as $section) echo '<li><a href="#'.$section.'">'.date::$SECTIONS[$section][$lang].'</a></li>';
		echo					'<li><a href="#footer">'.date::$CONTACT_US[$lang].'</a></li>';
								if ($lang_n > 1) {
									echo '<li>';
									$n = 1;
									foreach (date::$LANG as $value) {
										echo '<a href="'.$value.'">'.$value.'</a>';
										if ($n < $lang_n) echo ' | ';
										$n = $n + 1;
									}
									echo '</li>';
								}
		echo				'</ul>
						</nav>
						<h1>'.date::$TITLE[$lang].'</h1>
						<a class="button" href="#footer">'.date::$CONTACT_US[$lang].'</a>
						<h2><span class="whiteBg">'.date::$OFFER[$lang].'</span></h2>
					</div>
				</div>
				<div class="headerContacts">
					<div class="wrapper"><div>
						<span class="color1">'.date::$LOCATION1[$lang].'</span><br>
						'.date::$LOCATION2[$lang].'
					</div><div>
						<span class="color1">'.date::$PHONE1[$lang].'</span><br>
						<a href="tel:+'.preg_replace('/\D/', '', date::$PHONE2[$lang]).'">'.date::$PHONE2[$lang].'</a>
					</div><div>
						<span class="color1">'.date::$EMAIL1[$lang].'</span><br>
						<a href="mailto:'.date::$EMAIL2[$lang].'">'.date::$EMAIL2[$lang].'</a>
					</div><div>
						<a class="social_net pc" style="background-image: url(\'img/lwf/sn-ico/'.date::$SOCIAL_NETWORK[$lang].'-logo.png\')" href="'.date::$SOCIAL_NETWORK_LINK[$lang].'" target="_blank"></a>
						<span class="color2">'.date::$OTHER1[$lang].'</span><br>
						'.date::$OTHER2[$lang].'
					</div><div class="smartphone">
						<a class="social_net" style="background-image: url(\'img/lwf/sn-ico/'.date::$SOCIAL_NETWORK[$lang].'-logo.png\')" href="'.date::$SOCIAL_NETWORK_LINK[$lang].'" target="_blank"></a>
					</div></div>
				</div>
			</header>

			<div class="menuIco" onclick="document.getElementById(\'menu\').style.visibility=\'visible\'"></div>
			<div id="menu" class="menu">
				<div class="close" onclick="document.getElementById(\'menu\').style.visibility=\'hidden\'"></div>
				<ul>';
					$arr = array_keys(date::$SECTIONS);
					foreach ($arr as $section) echo '<li><a href="#'.$section.'" onclick="document.getElementById(\'menu\').style.visibility=\'hidden\'">'.date::$SECTIONS[$section][$lang].'</a></li>';
		echo		'<li><a href="#footer" onclick="document.getElementById(\'menu\').style.visibility=\'hidden\'">'.date::$CONTACT_US[$lang].'</a></li>';
			if ($lang_n > 1) {
				echo '<li>';
				$n = 1;
				foreach (date::$LANG as $value) {
					echo '<a href="'.$value.'">'.$value.'</a>';
					if ($n < $lang_n) echo ' | ';
					$n = $n + 1;
				}
				echo '</li>';
			}
		echo	'</ul>
			</div>

			<div id="viewer" class="viewer" onclick="document.getElementById(\'viewer\').style.visibility=\'hidden\'"></div>

			<main>
		';
	}

	// Sections

	public static function openSection($section) {
		echo '
			<article class="wrapper">
				<a id="'.$section.'"></a>
		';
	}

	public static function closeSection() {
		echo '
			</article>
		';
	}

	// Block - First text

	public static function firstText($section, $lang) {
		if (array_key_exists($section, date::$FIRST_TEXT) == true) {
			echo '
				<div class="firstText">
					<h2>'.date::$FIRST_TEXT[$section][$lang][0].'</h2>
					<p>'.date::$FIRST_TEXT[$section][$lang][1].'</p>
				</div>
			';
		}
	}

	// Block - Second text

	public static function secondText($section, $lang) {
		if (array_key_exists($section, date::$SECOND_TEXT) == true) {
			echo '
				<div class="secondText">
					<img src="img/'.date::$SECOND_TEXT[$section][0].'" alt="'.date::$SECOND_TEXT[$section][1][$lang][0].'">
					<h2>'.date::$SECOND_TEXT[$section][1][$lang][0].'</h2>
					<p>'.date::$SECOND_TEXT[$section][1][$lang][1].'</p>
				</div>
			';
		}
	}

	// Block - Image block with 3 pictures, text and button

	public static function imgBlock3($section, $lang) {
		if (array_key_exists($section, date::$IMG_BLOCK3) == true) {
			echo '
				<div class="imgBlock">';
			foreach (date::$IMG_BLOCK3[$section] as $imgTxt) {
				echo '
					<div class="img3" style="background-image:url(\'img/'.$imgTxt[0].'\');">
						<div class="imgTxtBg"><h3>'.$imgTxt[1][$lang].'</h3></div>
						<a class="button" href="#footer">'.$imgTxt[2][$lang].'</a>
					</div>';
			}
			echo '
				</div>
			';
		}
	}

	// Block - Image block with 4 pictures and text

	public static function imgBlock4($section, $lang) {
		if (array_key_exists($section, date::$IMG_BLOCK4) == true) {
			echo '
				<div class="imgBlock">';
			foreach (date::$IMG_BLOCK4[$section] as $imgTxt) {
				echo '
					<div class="img4" style="background-image:url(\'img/'.$imgTxt[0].'\');';
				if ($imgTxt[1][$lang] == '') echo ' cursor:pointer;" onclick="document.getElementById(\'viewer\').style.visibility=\'visible\'; document.getElementById(\'viewer\').style.backgroundImage=\'url(img/'.$imgTxt[0].')\';"';
				else echo '"';
				echo '>';
				if ($imgTxt[1][$lang] != '') echo '<div class="imgTxtBg"><h3>'.$imgTxt[1][$lang].'</h3></div>';
				echo '</div>';
			}
			echo '
				</div>
			';
		}
	}

	// Block - Image block with 6 pictures and text

	public static function imgBlock6($section, $lang) {
		if (array_key_exists($section, date::$IMG_BLOCK6) == true) {
			echo '
				<div class="imgBlock">';
			foreach (date::$IMG_BLOCK6[$section] as $imgTxt) {
				echo '
					<div class="img6" style="background-image:url(\'img/'.$imgTxt[0].'\');';
				if ($imgTxt[1][$lang] == '') echo ' cursor:pointer;" onclick="document.getElementById(\'viewer\').style.visibility=\'visible\'; document.getElementById(\'viewer\').style.backgroundImage=\'url(img/'.$imgTxt[0].')\';"';
				else echo '"';
				echo '>';
				if ($imgTxt[1][$lang] != '') echo '<div class="imgTxtBg"><h3>'.$imgTxt[1][$lang].'</h3></div>';
				echo '</div>';
			}
			echo '
				</div>
			';
		}
	}

	// Block - Benefits

	public static function benefits($section, $lang) {
		if (array_key_exists($section, date::$BENEFITS) == true) {
			echo '
				<div class="imgBlock">';
			foreach (date::$BENEFITS[$section] as $benefit) {
				echo '
					<span>'.$benefit[$lang].'</span>';
			}
			echo '
				</div>
			';
		}
	}

	// Block - 360 deg

	public static function deg360($section) {
		if (array_key_exists($section, date::$DEG360) == true) {
			echo '
				<script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
				<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css">

				<div id="panorama" style="background-image: url(\'img/'.date::$DEG360[$section][0].'\');"></div>
				
				<script>

				pannellum.viewer("panorama", {
					"type": "equirectangular",
					"panorama": "'.date::$DEG360[$section][1].'?size=2560x1280&quality=96&sign=5ed8820f107d1a06d35f02f3269c6acf&type=album"
				});

				</script>
			';
		}
	}

	// Block - Now

	public static function now($section, $lang) {
		if (array_key_exists($section, date::$NOW) == true) {
			echo '
				<div class="now">
					<div class="wrapper">
						<h2>'.date::$NOW[$section][$lang].'</h2>
						<a class="button" href="#footer">'.date::$CONTACT_US[$lang].'</a>
					</div>
				</div>
			';
		}
	}

	// Block - User Code

	public static function userCode($section, $lang) {
		if (array_key_exists($section, date::$USER_CODE) == true) {
			include_once date::$USER_CODE[$section][$lang];
		}
	}

	// Block - Brands

	public static function brands($section) {
		if (array_key_exists($section, date::$BRANDS) == true) {
			echo '<div class="brands">';
			foreach (date::$BRANDS[$section] as $brand) {
				echo '<a href="'.$brand[1].'" target="_blank"><img src="img/'.$brand[0].'" alt=""></a>';
			}
			echo '</div>';
		}
	}
	
    // 	Block - Yandex Reviews

	public static function yandexReviews() {
        if (isset(date::$YANDEX_REVIEWS)) echo '
        <style>
            iframe[src*="yandex.ru/maps-reviews-widget"] {
                transform: translateY(-110px);
            }
        </style>
        <article class="wrapper">' . date::$YANDEX_REVIEWS . '</article>';
	}
	
    // Block - FAQ
	
    public static function faq($lang) {
        if (isset(date::$FAQ)) {
            echo '<div class="wrapper"><div class="firstText"><h2>'.date::$FAQ[0][$lang].'</h2></div><div class="faqContainer">';
            $faqEntities = []; // массив для JSON-LD
            foreach (date::$FAQ[1] as $faqItem) {
                echo '<div class="faqItem">';
                    echo '<div class="faqQuestion">'.$faqItem[0][$lang].'</div>';
                    echo '<div class="faqAnswer">'.$faqItem[1][$lang].'</div>';
                echo '</div>';
                $qText = strip_tags($faqItem[0][$lang]);
                $aText = strip_tags($faqItem[1][$lang]);
                $aText = str_replace(["\r\n", "\r", "\n", "\t"], " ", $aText);
                $qText = str_replace(["\r\n", "\r", "\n", "\t"], " ", $qText);
                $aText = preg_replace('/\s{2,}/u', ' ', $aText);
                $qText = preg_replace('/\s{2,}/u', ' ', $qText);
                $qText = trim($qText);
                $aText = trim($aText);
                $faqEntities[] = [
                    "@type" => "Question",
                    "name" => $qText,
                    "acceptedAnswer" => [
                        "@type" => "Answer",
                        "text" => $aText
                    ]
                ];
            }
            echo '
            </div>
            <script>
                const faqItems = document.querySelectorAll(".faqItem");
                faqItems.forEach(item => {
                    item.addEventListener("click", function() {
                        this.classList.toggle("active");
                    });
                });
            </script>';
            $faqJson = [
                "@context" => "https://schema.org",
                "@type" => "FAQPage",
                "mainEntity" => $faqEntities
            ];
            echo '<script type="application/ld+json">'.json_encode($faqJson, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES).'</script>';
            echo '</div>';
        }
    }

    // 	Block - MicroBlogger(MB)

    public static function mb() {
        if (isset(date::$MB)) {
            echo '<div class="wrapper"><div class="firstText">';
            $path = date::$MB . '/mb/lastposts.php';
            $realPath = realpath($path);
            if ($realPath) {
                include_once $realPath;
            } else {
                echo "Not file: $path";
            }
            echo '</div></div>';
        }
    }
    
    // Block - VK Widget
    
	public static function vkWidget() {
        if (isset(date::$VK_WIDGET)) echo '<article class="wrapper" style="padding-top: 70px; display: flex; justify-content: center; align-items: center;">' . date::$VK_WIDGET . '</article>';
	}

	// Block - Reviews

    public static function comments($lang) {
        if (isset(date::$COMMENTS)) {
            echo '<div class="wrapper"><div class="firstText"><h2>'.date::$COMMENTS[0][$lang].'</h2></div></div>';
            
            $commentsData = date::$COMMENTS[1];
            shuffle($commentsData);
            $jsItems = [];
            foreach ($commentsData as $item) {
                $name = json_encode($item[0][0], JSON_UNESCAPED_UNICODE);
                $text = json_encode($item[1][0], JSON_UNESCAPED_UNICODE);
                $date = json_encode($item[2][0], JSON_UNESCAPED_UNICODE);
                $jsItems[] = "{ name: $name, text: $text, date: $date }";
            }
            $testimonialsJs = implode(",\n        ", $jsItems);
            
            echo <<<'EOF'

<div class="testimonial-section">
    <div class="marquee-viewport" id="marqueeViewport">
        <div class="marquee-track" id="marqueeTrack">
        </div>
    </div>
</div>

<script>
    const testimonialsData = [
EOF;
            echo "\n        $testimonialsJs\n    ];\n";
            echo <<<'EOF'

    let track = document.getElementById('marqueeTrack');
    let viewport = document.getElementById('marqueeViewport');
    let animationId = null;
    let isPaused = false;
    let translateX = 0;
    let setWidth = 0;
    let speed = 50;
    let lastTimestamp = 0;
    let isAnimating = false;
    let resizeObserver = null;
    let dragging = false;
    let dragStartX = 0;
    let dragStartY = 0;
    let dragStartTranslate = 0;
    let dragDirectionLocked = false;
    let dragIsHorizontal = false;

    function createCard(item) {
        const card = document.createElement('div');
        card.className = 'testimonial-card';
        
        const nameDiv = document.createElement('div');
        nameDiv.className = 'testimonial-name';
        nameDiv.innerText = item.name;
        
        const textDiv = document.createElement('div');
        textDiv.className = 'testimonial-text';
        textDiv.innerText = item.text;
        
        const dateDiv = document.createElement('div');
        dateDiv.className = 'testimonial-date';
        dateDiv.innerText = item.date;
        
        card.appendChild(nameDiv);
        card.appendChild(textDiv);
        card.appendChild(dateDiv);
        
        return card;
    }

    function buildTrack() {
        if (!track) return;
        track.innerHTML = '';
        
        for (let i = 0; i < testimonialsData.length; i++) {
            const card = createCard(testimonialsData[i]);
            track.appendChild(card);
        }
        
        for (let i = 0; i < testimonialsData.length; i++) {
            const cardCopy = createCard(testimonialsData[i]);
            track.appendChild(cardCopy);
        }
    }

    function calculateSetWidth() {
        if (!track) return 0;
        const cards = track.querySelectorAll('.testimonial-card');
        const originalCount = testimonialsData.length;
        
        if (cards.length < originalCount * 2) return 0;
        
        let widthSum = 0;
        for (let i = 0; i < originalCount; i++) {
            const card = cards[i];
            if (card) {
                const rect = card.getBoundingClientRect();
                widthSum += rect.width;
            }
        }
        
        const trackStyle = getComputedStyle(track);
        const gapValue = parseFloat(trackStyle.gap) || 20;
        const gapsTotal = (originalCount - 1) * gapValue;
        
        return widthSum + gapsTotal;
    }

    function applyTranslate() {
        if (!track) return;
        track.style.transform = `translateX(${translateX}px)`;
    }

    function normalizeTranslate() {
        if (setWidth <= 0) return;
        if (translateX <= -setWidth) {
            translateX += setWidth;
        } else if (translateX > 0) {
            translateX -= setWidth;
        }
        if (translateX < -setWidth) translateX += setWidth;
        if (translateX > 0) translateX -= setWidth;
        applyTranslate();
    }

    function step(timestamp) {
        if (!isAnimating) return;
        
        if (!isPaused && !dragging && setWidth > 0) {
            if (lastTimestamp === 0) {
                lastTimestamp = timestamp;
                requestAnimationFrame(step);
                return;
            }
            
            const delta = Math.min(0.05, (timestamp - lastTimestamp) / 1000);
            if (delta > 0 && delta < 0.2) {
                let move = speed * delta;
                translateX -= move;
                
                if (translateX <= -setWidth) {
                    translateX += setWidth;
                    while (translateX <= -setWidth && setWidth > 0) {
                        translateX += setWidth;
                    }
                } 
                if (translateX > 0 && setWidth > 0) {
                    translateX -= setWidth;
                }
                
                applyTranslate();
            }
            lastTimestamp = timestamp;
        } else {
            if (!isPaused && !dragging) {
            } else {
                lastTimestamp = 0;
            }
        }
        
        animationId = requestAnimationFrame(step);
    }

    function startScrollAnimation() {
        if (animationId) {
            cancelAnimationFrame(animationId);
            animationId = null;
        }
        isAnimating = true;
        lastTimestamp = 0;
        animationId = requestAnimationFrame(step);
    }

    function stopScrollAnimation() {
        if (animationId) {
            cancelAnimationFrame(animationId);
            animationId = null;
        }
        isAnimating = false;
    }

    function pauseScroll() {
        if (isPaused) return;
        isPaused = true;
        viewport.classList.add('paused');
        lastTimestamp = 0;
    }

    function resumeScroll() {
        if (!isPaused) return;
        isPaused = false;
        viewport.classList.remove('paused');
        lastTimestamp = 0;
        if (!isAnimating) {
            startScrollAnimation();
        }
    }
    
    function recalcAndFix() {
        if (!track) return;
        const newSetWidth = calculateSetWidth();
        if (newSetWidth > 0 && Math.abs(newSetWidth - setWidth) > 1) {
            const oldSetWidth = setWidth;
            setWidth = newSetWidth;
            
            if (oldSetWidth > 0 && setWidth > 0) {
                let ratio = Math.abs(translateX) / oldSetWidth;
                let newTranslate = -(ratio * setWidth);
                if (newTranslate > 0) newTranslate = -setWidth + (newTranslate % setWidth);
                if (newTranslate < -setWidth) newTranslate += setWidth;
                translateX = newTranslate;
                applyTranslate();
                normalizeTranslate();
            } else {
                translateX = 0;
                applyTranslate();
            }
        } else if (newSetWidth > 0 && setWidth === 0) {
            setWidth = newSetWidth;
            translateX = 0;
            applyTranslate();
        } else if (newSetWidth !== setWidth && newSetWidth > 0) {
            setWidth = newSetWidth;
            normalizeTranslate();
        }
        
        if (setWidth > 0) {
            if (translateX <= -setWidth) translateX += setWidth;
            if (translateX > 0) translateX -= setWidth;
            applyTranslate();
        }
    }

    function onDragStart(clientX, clientY) {
        if (!setWidth) return;
        dragging = true;
        dragStartX = clientX;
        dragStartY = clientY;
        dragStartTranslate = translateX;
        dragDirectionLocked = false;
        dragIsHorizontal = false;
        track.style.cursor = 'grabbing';
        viewport.style.cursor = 'grabbing';
        pauseScroll();
    }

    function onDragMove(clientX, clientY) {
        if (!dragging) return;
        
        if (!dragDirectionLocked) {
            let deltaX = Math.abs(clientX - dragStartX);
            let deltaY = Math.abs(clientY - dragStartY);
            if (deltaX > 5 || deltaY > 5) {
                dragDirectionLocked = true;
                dragIsHorizontal = deltaX > deltaY;
                if (dragIsHorizontal) {
                    viewport.style.touchAction = 'none';
                } else {
                    onDragEnd();
                    return;
                }
            } else {
                return;
            }
        }
        
        if (dragIsHorizontal) {
            let delta = clientX - dragStartX;
            let newTranslate = dragStartTranslate + delta;
            translateX = newTranslate;
            normalizeTranslate();
            applyTranslate();
        }
    }

    function onDragEnd() {
        if (!dragging) return;
        dragging = false;
        dragDirectionLocked = false;
        dragIsHorizontal = false;
        track.style.cursor = '';
        viewport.style.cursor = '';
        viewport.style.touchAction = '';
        resumeScroll();
        lastTimestamp = 0;
    }

    function initDrag() {
        let isDraggingNow = false;
        
        const onMouseDown = (e) => {
            if (e.button !== 0) return;
            e.preventDefault();
            onDragStart(e.clientX, e.clientY);
            isDraggingNow = true;
        };
        
        const onMouseMove = (e) => {
            if (isDraggingNow && dragging) {
                e.preventDefault();
                onDragMove(e.clientX, e.clientY);
            }
        };
        
        const onMouseUp = () => {
            if (isDraggingNow) {
                isDraggingNow = false;
                onDragEnd();
            }
        };
        
        const onTouchStart = (e) => {
            if (e.touches.length) {
                onDragStart(e.touches[0].clientX, e.touches[0].clientY);
                isDraggingNow = true;
            }
        };
        
        const onTouchMove = (e) => {
            if (isDraggingNow && dragging && e.touches.length) {
                onDragMove(e.touches[0].clientX, e.touches[0].clientY);
                if (dragIsHorizontal) {
                    e.preventDefault();
                }
            }
        };
        
        const onTouchEnd = (e) => {
            if (isDraggingNow) {
                isDraggingNow = false;
                onDragEnd();
            }
        };
        
        viewport.addEventListener('mousedown', onMouseDown);
        window.addEventListener('mousemove', onMouseMove);
        window.addEventListener('mouseup', onMouseUp);
        viewport.addEventListener('touchstart', onTouchStart, { passive: false });
        window.addEventListener('touchmove', onTouchMove, { passive: false });
        window.addEventListener('touchend', onTouchEnd);
        window.addEventListener('touchcancel', onTouchEnd);
    }

    function initPauseOnHoverAndTouch() {
        if (!viewport) return;
        
        viewport.addEventListener('mouseenter', () => { if (!dragging) pauseScroll(); });
        viewport.addEventListener('mouseleave', () => { if (!dragging) resumeScroll(); });
    }

    function initResizeObserver() {
        if (window.ResizeObserver) {
            resizeObserver = new ResizeObserver(() => {
                setTimeout(() => { if (track && track.children.length) recalcAndFix(); }, 30);
            });
            if (viewport) resizeObserver.observe(viewport);
            if (track) resizeObserver.observe(track);
        }
        window.addEventListener('resize', () => {
            setTimeout(() => { if (track && track.children.length) recalcAndFix(); }, 60);
        });
    }

    function initInfiniteCarousel() {
        buildTrack();
        setTimeout(() => {
            const newWidth = calculateSetWidth();
            if (newWidth > 0) {
                setWidth = newWidth;
                translateX = 0;
                applyTranslate();
            } else {
                setTimeout(() => {
                    const w = calculateSetWidth();
                    if (w > 0) setWidth = w;
                    translateX = 0;
                    applyTranslate();
                }, 80);
            }
            if (isAnimating) stopScrollAnimation();
            startScrollAnimation();
            initDrag();
        }, 20);
    }

    window.addEventListener('load', () => {
        initInfiniteCarousel();
        initPauseOnHoverAndTouch();
        initResizeObserver();
    });
    
    document.addEventListener('visibilitychange', () => {
        if (!document.hidden && !isPaused && !dragging && isAnimating) lastTimestamp = 0;
    });
    
    window.addEventListener('beforeunload', () => {
        if (animationId) cancelAnimationFrame(animationId);
    });
</script>
EOF;
            echo '<div style="text-align: center; padding-bottom: 40px;"><a href="https://yandex.ru/profile/116527983929" target="_blank"><img src="./img/yandex-reviews.jpg" width="100px"></a></div>';
        }
    }
	
	// Footer

	public static function footer($lang) {
		echo '
		 	</main>
		 	
			<footer itemscope itemtype="http://schema.org/Organization">
				<a id="footer"></a>
				<div class="footerInnerWrapper">
					<h2>'.date::$OFFER[$lang].'</h2>
				</div>
				<div class="footerContacts">
					<div class="footerInnerWrapper">
						<div class="contacts">
							<h3>'.date::$CONTACT_US[$lang].'</h3>
							<div>
								'.date::$LOCATION1[$lang].'<br>
								<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><span itemprop="addressLocality">'.date::$LOCATION2[$lang].'</span></span>
							</div>
							<div>
								'.date::$PHONE1[$lang].'<br>
								<span itemprop="telephone"><a href="tel:+'.preg_replace('/\D/', '', date::$PHONE2[$lang]).'">'.date::$PHONE2[$lang].'</a></span>
							</div>
							<div>
								'.date::$EMAIL1[$lang].'<br>
								<a href="mailto:'.date::$EMAIL2[$lang].'"><span itemprop="email">'.date::$EMAIL2[$lang].'</span></a>
							</div>
							<a class="social_net" style="background-image: url(\'img/lwf/sn-ico/'.date::$SOCIAL_NETWORK[$lang].'-logo.png\')" href="'.date::$SOCIAL_NETWORK_LINK[$lang].'" target="_blank"></a>
						</div>
						<div class="form">';

		if (isset($_POST['name']) && isset($_POST['email']) && $_POST['lastname']=='') {
			echo '<p>'.$_POST['name'].', '.date::$FORM_SENDED[$lang].'!</p>';

			$to  = "<design@evbkv.ru>";
			$subject = "Message from evbkv.ru/design";
			$message = '<p>Name: '.$_POST['name'].'</p><p>E-mail: '.$_POST['email'].'</p><p>Message: '.$_POST['text'].'</p>';
			$headers  = "Content-type: text/html; charset=utf-8 \r\n";
			$headers .= "From: <mail@evbkv.ru>\r\n";
			$headers .= "Reply-To: mail@evbkv.ru\r\n";
			mail($to, $subject, $message, $headers);

		} else {
			echo '

							<form method="post">
								<input type="text" id="sp" name="lastname">
								<input type="text" name="name" placeholder="'.date::$FORM_NAME[$lang].'" required>
								<input type="email" name="email" placeholder="'.date::$FORM_EMAIL[$lang].'" required>
								<textarea name="text">'.date::$FORM_MESSAGE[$lang].'</textarea>
								<input type="submit" value="'.date::$FORM_SEND[$lang].'">
							</form>
							<script>document.getElementById(\'sp\').style.display = \'none\'</script>
							';
		}
		echo '
						</div>
					</div>
				</div>

				<div class="copyright">
					© <span itemprop="name">'.date::$NAME[$lang].'</span>
				</div>

			</footer>

			<div id="ontop" class="ontop" onclick="window.scrollTo(0, 0);"></div>
			<script>
				window.onscroll = function() {
					var scrolled = window.pageYOffset || document.documentElement.scrollTop;
					var minScrolled = 600;
					if (scrolled > minScrolled) document.getElementById(\'ontop\').style.visibility = \'visible\';
					if (scrolled < minScrolled) document.getElementById(\'ontop\').style.visibility = \'hidden\';
				}
			</script>
		';
	}

}
