function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; } const ANIMATION_DURATION = 300;

const SIDEBAR_EL = document.getElementById("sidebar");
SIDEBAR_EL.classList.add("collapsed");


const SUB_MENU_ELS = document.querySelectorAll(
  ".menu > ul > .menu-item.sub-menu");


const FIRST_SUB_MENUS_BTN = document.querySelectorAll(
  ".menu > ul > .menu-item.sub-menu > a");


const INNER_SUB_MENUS_BTN = document.querySelectorAll(
  ".menu > ul > .menu-item.sub-menu .menu-item.sub-menu > a");

// Initialisation
handleMenuDisplay();

// Ecoute l'événement de redimensionnement de la fenêtre
window.addEventListener('resize', handleMenuDisplay);

function handleMenuDisplay() {
  if (window.innerWidth <= 576) {
    // Si la largeur de l'écran est inférieure ou égale à 576px, étend le menu
    SIDEBAR_EL.classList.remove("collapsed");
  } else {
    // Sinon, contracte le menu
    SIDEBAR_EL.classList.add("collapsed");
  }
}


const MENU_ITEM_LINKS = document.querySelectorAll('.menu > ul > .menu-item > a');

let tooltip;

MENU_ITEM_LINKS.forEach((element) => {
  element.addEventListener('mouseenter', function (e) {
    if (SIDEBAR_EL.classList.contains('collapsed')) {
      const menuTitle = e.target.querySelector('.menu-title').textContent;

      tooltip = document.createElement('div');
      tooltip.style.position = 'absolute';
      tooltip.style.left = `${e.pageX + 20}px`;
      tooltip.style.top = `${e.pageY}px`;
      tooltip.style.textTransform = 'capitalize';
      tooltip.style.backgroundImage = 'linear-gradient(to top, #946E23, #6E5016)';
      tooltip.style.color = '#fff';
      tooltip.style.textShadow = '3px 3px 3px rgba(0, 0, 0, 1.0)';
      tooltip.style.padding = '5px';
      tooltip.style.borderRadius = '5px';
      tooltip.style.boxShadow = '5px 5px 15px 2px rgba(0, 0, 0, 0.7)';
      tooltip.style.zIndex = 9999;
      tooltip.style.fontSize = 'medium';
      tooltip.textContent = menuTitle;

      document.body.appendChild(tooltip);
    }
  });

  element.addEventListener('mousemove', function (e) {
    if (SIDEBAR_EL.classList.contains('collapsed')) {
      tooltip.style.left = `${e.pageX + 20}px`;
      tooltip.style.top = `${e.pageY}px`;
    }
  });

  element.addEventListener('mouseleave', function () {
    if (tooltip) {
      document.body.removeChild(tooltip);
      tooltip = null;
    }
  });
});




class PopperObject {




  constructor(reference, popperTarget) {
    _defineProperty(this, "instance", null); _defineProperty(this, "reference", null); _defineProperty(this, "popperTarget", null);
    this.init(reference, popperTarget);
  }

  init(reference, popperTarget) {
    this.reference = reference;
    this.popperTarget = popperTarget;
    this.instance = Popper.createPopper(this.reference, this.popperTarget, {
      placement: "right",
      strategy: "fixed",
      resize: true,
      modifiers: [
        {
          name: "computeStyles",
          options: {
            adaptive: false
          }
        },


        {
          name: "flip",
          options: {
            fallbackPlacements: ["left", "right"]
          }
        }]
    });





    document.addEventListener(
      "click",
      e => this.clicker(e, this.popperTarget, this.reference),
      false);


    const ro = new ResizeObserver(() => {
      this.instance.update();
    });

    ro.observe(this.popperTarget);
    ro.observe(this.reference);
  }

  clicker(event, popperTarget, reference) {
    if (
      SIDEBAR_EL.classList.contains("collapsed") &&
      !popperTarget.contains(event.target) &&
      !reference.contains(event.target)) {
      this.hide();
    }
  }

  hide() {
    this.instance.state.elements.popper.style.visibility = "hidden";
  }
}


class Poppers {


  constructor() {
    _defineProperty(this, "subMenuPoppers", []);
    this.init();
  }

  init() {
    SUB_MENU_ELS.forEach(element => {
      this.subMenuPoppers.push(
        new PopperObject(element, element.lastElementChild));

      this.closePoppers();
    });
  }

  togglePopper(target) {
    if (window.getComputedStyle(target).visibility === "hidden")
      target.style.visibility = "visible"; else
      target.style.visibility = "hidden";
  }

  updatePoppers() {
    this.subMenuPoppers.forEach(element => {
      element.instance.state.elements.popper.style.display = "none";
      element.instance.update();
    });
  }

  closePoppers() {
    this.subMenuPoppers.forEach(element => {
      element.hide();
    });
  }
}


const slideUp = (target, duration = ANIMATION_DURATION) => {
  const { parentElement } = target;
  parentElement.classList.remove("open");
  target.style.transitionProperty = "height, margin, padding";
  target.style.transitionDuration = `${duration}ms`;
  target.style.boxSizing = "border-box";
  target.style.height = `${target.offsetHeight}px`;
  target.offsetHeight;
  target.style.overflow = "hidden";
  target.style.height = 0;
  target.style.paddingTop = 0;
  target.style.paddingBottom = 0;
  target.style.marginTop = 0;
  target.style.marginBottom = 0;
  window.setTimeout(() => {
    target.style.display = "none";
    target.style.removeProperty("height");
    target.style.removeProperty("padding-top");
    target.style.removeProperty("padding-bottom");
    target.style.removeProperty("margin-top");
    target.style.removeProperty("margin-bottom");
    target.style.removeProperty("overflow");
    target.style.removeProperty("transition-duration");
    target.style.removeProperty("transition-property");
  }, duration);
};
const slideDown = (target, duration = ANIMATION_DURATION) => {
  const { parentElement } = target;
  parentElement.classList.add("open");
  target.style.removeProperty("display");
  let { display } = window.getComputedStyle(target);
  if (display === "none") display = "block";
  target.style.display = display;
  const height = target.offsetHeight;
  target.style.overflow = "hidden";
  target.style.height = 0;
  target.style.paddingTop = 0;
  target.style.paddingBottom = 0;
  target.style.marginTop = 0;
  target.style.marginBottom = 0;
  target.offsetHeight;
  target.style.boxSizing = "border-box";
  target.style.transitionProperty = "height, margin, padding";
  target.style.transitionDuration = `${duration}ms`;
  target.style.height = `${height}px`;
  target.style.removeProperty("padding-top");
  target.style.removeProperty("padding-bottom");
  target.style.removeProperty("margin-top");
  target.style.removeProperty("margin-bottom");
  window.setTimeout(() => {
    target.style.removeProperty("height");
    target.style.removeProperty("overflow");
    target.style.removeProperty("transition-duration");
    target.style.removeProperty("transition-property");
  }, duration);
};

const slideToggle = (target, duration = ANIMATION_DURATION) => {
  if (window.getComputedStyle(target).display === "none")
    return slideDown(target, duration);
  return slideUp(target, duration);
};

const PoppersInstance = new Poppers();

/**
 * wait for the current animation to finish and update poppers position
 */
const updatePoppersTimeout = () => {
  setTimeout(() => {
    PoppersInstance.updatePoppers();
  }, ANIMATION_DURATION);
};

/**
 * sidebar collapse handler
 */
document.getElementById("btn-collapse").addEventListener("click", () => {
  SIDEBAR_EL.classList.toggle("collapsed");
  PoppersInstance.closePoppers();
  if (SIDEBAR_EL.classList.contains("collapsed"))
    FIRST_SUB_MENUS_BTN.forEach(element => {
      element.parentElement.classList.remove("open");
    });

  updatePoppersTimeout();
});

/**
 * sidebar toggle handler (on break point )
 */
document.getElementById("btn-toggle").addEventListener("click", () => {
  SIDEBAR_EL.classList.toggle("toggled");

  updatePoppersTimeout();
});

/**
 * toggle sidebar on overlay click
 */
document.getElementById("overlay").addEventListener("click", () => {
  SIDEBAR_EL.classList.toggle("toggled");
});

const defaultOpenMenus = document.querySelectorAll(".menu-item.sub-menu.open");

defaultOpenMenus.forEach(element => {
  element.lastElementChild.style.display = "block";
});

/**
 * handle top level submenu click
 */
FIRST_SUB_MENUS_BTN.forEach(element => {
  element.addEventListener("click", () => {
    if (SIDEBAR_EL.classList.contains("collapsed"))
      PoppersInstance.togglePopper(element.nextElementSibling); else {
      const parentMenu = element.closest(".menu.open-current-submenu");
      if (parentMenu)
        parentMenu.
          querySelectorAll(":scope > ul > .menu-item.sub-menu > a").
          forEach(
            (el) =>
              window.getComputedStyle(el.nextElementSibling).display !==
              "none" && slideUp(el.nextElementSibling));

      slideToggle(element.nextElementSibling);
    }
  });
});

/**
 * handle inner submenu click
 */
INNER_SUB_MENUS_BTN.forEach(element => {
  element.addEventListener("click", () => {
    slideToggle(element.nextElementSibling);
  });
});