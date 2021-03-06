import { CookieConsent } from 'cookie-sanction';
import Vue from 'vue';
import Page from './Components/Page';
import '@babel/polyfill';

window.onload = () => {

  const consent = new CookieConsent();
  consent.active().then(() => {
    /* eslint-disable */
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-90343888-1', 'auto');
    ga('send', 'pageview');
  });

  const vue = new Vue({
    el: '#app',
    components: {
      Page
    }
  });
};
