describe('login_test', () => {
    it('Visits the register page and signs up', () => {
      cy.visit('http://localhost/code-space/MK-TIME/MKTIME/register&login.php')
      
      // Click on "Signup now" to switch to the signup form
      
  
      // Fill in the signup form
      
      cy.get('input[name="logEmail"]').type('San@gmail.com')
      cy.get('input[name="logPassword"]').type('123')
  
      // Submit the form
      cy.get('input[type="submit"][value="Submit"]').click()
      cy.contains('welcome Sandy')

    })
  })
  