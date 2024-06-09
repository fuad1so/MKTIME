describe('Add to cart', () => {
    it('Visits the register page and signs up', () => {
      cy.visit('http://localhost/code-space/MK-TIME/MKTIME/electronic.php')
      
      // Click on "Signup now" to switch to the signup form
      cy.get('.col-lg-4').contains('Add to Cart').click()
      
  
      // Fill in the signup form
     
     cy.contains('Classic Watch')
  
      // Submit the form
      
      
      // Assert that the email field contains the correct value (example)
    
    })
  })
  