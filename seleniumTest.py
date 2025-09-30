# ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ selenium test complete ~~~~~~~~~~~~~~~~~~~~~~~~~~~~
import time
import pandas as pd
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import Options

# Chrome options for running the test
options = Options()
options.add_argument('--no-sandbox')
driver = webdriver.Chrome(options=options)

# Load test cases from file
try:
    # Attempt to read as CSV
    test_cases_df = pd.read_csv('testCases.csv', delimiter='\t', encoding='ISO-8859-1')
except FileNotFoundError:
    # If CSV is not found, attempt to read as Excel
    test_cases_df = pd.read_excel('testCases.xlsx')

# Convert DataFrame to a list of dictionaries
test_cases = test_cases_df.to_dict(orient='records')

# Prices from menu.php
prices = [21.00, 15.00, 15.00, 25.00, 18.00, 11.00, 16.00, 2.00]

# Iterate through test cases
for idx, row in enumerate(test_cases, start=1):
    driver.get("http://localhost/102767967/menu.php")
    driver.maximize_window()

    # Enter quantities into the menu
    for i in range(1, 9):  # Assuming there are 8 items
        qty_name = f'qty{i}'
        driver.find_element(By.NAME, qty_name).send_keys(str(row[qty_name]))

    # Checkout
    time.sleep(1)
    driver.find_element(By.CLASS_NAME, 'checkout-button').click()

    # Wait for the cart page to load
    time.sleep(2)

    # Apply 50% discount if specified in the test case
    if str(row['discount_applied']).upper() == 'TRUE':  # If discount is True
        discount_checkbox = driver.find_element(By.ID, 'discountCheckbox')
        discount_checkbox.click()
        time.sleep(1)

    # Get computed total amount from the cart page
    computed_value = driver.find_element(By.ID, 'total').text.split(": RM ")[1]
    computed_value = round(float(computed_value), 2)  # Convert to float for comparison

    # Calculate expected subtotal, SST, and total based on input quantities and prices
    subtotal = sum(prices[i] * row[f'qty{i + 1}'] for i in range(8))
    sst = round(subtotal * 0.06, 2)
    expected_total = round(subtotal + sst, 2)

    # If discount is applied, reduce the total by 50%
    if str(row['discount_applied']).upper() == 'TRUE':
        expected_total = round(expected_total * 0.5, 2)

    # Compare computed value with the expected value provided in the test case file
    expected_total_from_case = round(float(row['expected_total']), 2)  # Ensure it's rounded
    test_result = "PASS" if computed_value == expected_total_from_case else "FAIL"

    # Print detailed results
    print(f"Test Case {idx}:")
    print(f"  - Expected Subtotal: RM {subtotal:.2f}")
    print(f"  - Expected SST (6%): RM {sst:.2f}")
    print(f"  - Expected Total from Case: RM {expected_total_from_case:.2f}")
    print(f"  - Computed Total: RM {computed_value:.2f}")
    print(f"  - Result: {test_result}\n")

# Close the browser after running all test cases
driver.quit()

