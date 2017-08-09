import { IsitabirdPage } from './app.po';

describe('isitabird App', () => {
  let page: IsitabirdPage;

  beforeEach(() => {
    page = new IsitabirdPage();
  });

  it('should display welcome message', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('Welcome to app!');
  });
});
