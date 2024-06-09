describe('SignUp_test', () => {
    it('Visits the register page and signs up', () => {
      cy.visit('http://localhost/code-space/MK-TIME/MKTIME/register&login.php')
      
      // Click on "Signup now" to switch to the signup form
      cy.contains('Sigup now').click()
  
      // Fill in the signup form
      cy.get('input[name="regFirstName"]').type('Sandy')
      cy.get('input[name="regLastName"]').type('Khotasa')
      cy.get('input[name="regEmail"]').type('San@gmail.com')
      cy.get('input[name="regPassword"]').type('123')
  
      // Submit the form
      cy.get('input[type="submit"][value="Sumbit"]').click()
      
      // Assert that the email field contains the correct value (example)
    
    })
  })
  