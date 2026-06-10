import os
from fpdf import FPDF

class ResumePDF(FPDF):
    def header(self):
        # Top banner with name and title
        self.set_fill_color(15, 16, 83) # Deep Navy (#0F1053)
        self.rect(0, 0, 210, 55, 'F')
        
        # Name
        self.set_text_color(255, 255, 255)
        self.set_font("helvetica", "B", 26)
        self.set_y(8)
        self.cell(0, 10, "IMRAN KHAN R", align="C", new_x="LMARGIN", new_y="NEXT")
        
        # Subtitle
        self.set_font("helvetica", "B", 12)
        self.set_text_color(189, 227, 255) # Light Blue (#BDE3FF)
        self.cell(0, 6, "SALES & OPERATIONAL EXECUTIVE", align="C", new_x="LMARGIN", new_y="NEXT")
        
        # Contact Details - Address left paragraph | Phone & Email right
        self.set_font("helvetica", "", 8.5)
        self.set_text_color(240, 249, 255) # Pale Blue (#F0F9FF)
        y_contact = self.get_y() + 2

        # Address as left-aligned paragraph
        self.set_xy(15, y_contact)
        self.multi_cell(110, 4.5,
            "2/1107 Annai Sathya Nagar,\nSakkimangalam, Madurai - 625201,\nTamil Nadu",
            align="L")

        # Phone & Email - right side
        self.set_xy(125, y_contact)
        self.multi_cell(70, 4.5,
            "+91 97156 20426\n111imrankhan111@gmail.com",
            align="R")

        self.set_y(58)

    def add_section_header(self, title):
        self.ln(3)
        self.set_font("helvetica", "B", 13)
        self.set_text_color(15, 16, 83) # Deep Navy (#0F1053)
        self.cell(0, 6, title, new_x="LMARGIN", new_y="NEXT")
        
        # Underline
        self.set_draw_color(15, 16, 83)
        self.set_line_width(0.5)
        self.line(self.get_x(), self.get_y(), 210 - 15, self.get_y())
        self.ln(3)

    def add_job(self, title, company, date, bullets):
        self.set_font("helvetica", "B", 10.5)
        self.set_text_color(15, 16, 83)
        self.cell(120, 5, f"{title} - {company}", new_x="RIGHT", new_y="LAST")
        self.set_font("helvetica", "I", 9.5)
        self.set_text_color(100, 100, 100)
        self.cell(0, 5, date, align="R", new_x="LMARGIN", new_y="NEXT")
        
        self.set_font("helvetica", "", 9)
        self.set_text_color(70, 70, 80)
        for bullet in bullets:
            self.cell(5, 4, "-", align="C")
            # MultiCell for wrapping long bullet points
            self.multi_cell(0, 4, bullet, new_x="LMARGIN", new_y="NEXT")
        self.ln(2.5)

# Initialize PDF
pdf = ResumePDF(orientation="P", unit="mm", format="A4")
pdf.set_margins(15, 15, 15)
pdf.set_auto_page_break(auto=True, margin=15)
pdf.add_page()

# SUMMARY
pdf.add_section_header("PROFESSIONAL SUMMARY")
pdf.set_font("helvetica", "", 9.5)
pdf.set_text_color(70, 70, 80)
summary_text = (
    "Results-oriented Sales & Operational Executive with over 8 years of experience "
    "across retail operations, area management, and distributor networks. Proven track record of consistently "
    "exceeding sales targets, executing high-impact merchandising promotions, and expanding retail footprint. "
    "Proficient in leveraging data analytics and AI automation tools (CRM, SQL, n8n workflows) to optimize sales processes "
    "and maximize customer engagement."
)
pdf.multi_cell(0, 4.5, summary_text, new_x="LMARGIN", new_y="NEXT")

# EXPERIENCE
pdf.add_section_header("PROFESSIONAL EXPERIENCE")

# Aqualite
aqualite_bullets = [
    "Achieve monthly sales targets and drive primary and secondary sales growth.",
    "Manage distributors, retailers, and stock availability.",
    "Appoint and develop new distributors and retail outlets.",
    "Generate orders and ensure timely collections.",
    "Execute promotions, merchandising, and branding activities.",
    "Increase market coverage and product visibility.",
    "Monitor competitor activities and market trends.",
    "Maintain strong dealer and retailer relationships.",
    "Submit sales reports and update CRM/DMS records."
]
pdf.add_job("Sales Development Executive", "Aqualite", "2026 - Present", aqualite_bullets)

# Campus
campus_bullets = [
    "Led market expansion and strategic territory growth.",
    "Expanded distributor coverage by 20% and established key retail partnerships.",
    "Drove consistent sales growth across all assigned territories.",
    "Execute promotions, merchandising, and branding activities.",
    "Increase market coverage and product visibility.",
    "Monitor competitor activities and market trends.",
    "Maintain strong dealer and retailer relationships.",
    "Submit sales reports and update CRM/DMS records."
]
pdf.add_job("Sales Development Executive", "Campus Activewear", "2025 - 2026", campus_bullets)

# Jeeth
jeeth_bullets = [
    "Exceeded sales targets consistently across all retail quarters.",
    "Built long-term strategic relationships with distributors and key retail partners.",
    "Executed localized promotional campaigns to boost customer engagement.",
    "Managed distributors, retailers, and ensured stock availability across territory.",
    "Generated orders and ensured timely collections from retail partners.",
    "Submitted sales reports and maintained updated CRM/DMS records."
]
pdf.add_job("Sales Executive", "Jeeth Enterprises", "2023 - 2025", jeeth_bullets)

# FashionWalks
fashion_bullets = [
    "Oversaw end-to-end inventory management, receiving, and dispatch operations.",
    "Improved warehouse utilization efficiency by over 15% through optimized layout systems.",
    "Coordinated labor teams and established highly efficient warehouse workflows."
]
pdf.add_job("Warehouse & Sales Coordinator", "FashionWalks", "2020 - 2023", fashion_bullets)

# J.K Fenner
fenner_bullets = [
    "Performed quality inspection of mechanical components and finished goods.",
    "Ensured products met company and industry quality standards.",
    "Documented quality reports and maintained inspection records."
]
pdf.add_job("Quality Controller", "J.K Fenner Pvt Ltd", "2018", fenner_bullets)

# SKILLS & CERTIFICATIONS
pdf.add_section_header("SKILLS & CERTIFICATIONS")

pdf.set_font("helvetica", "B", 9.5)
pdf.set_text_color(15, 16, 83)
pdf.cell(45, 5, "Business & Analytics:", new_x="RIGHT", new_y="LAST")
pdf.set_font("helvetica", "", 9)
pdf.set_text_color(70, 70, 80)
pdf.cell(0, 5, "Advanced Excel, SQL, Tableau, Google Data Studio, KPI Dashboards", new_x="LMARGIN", new_y="NEXT")

pdf.set_font("helvetica", "B", 9.5)
pdf.set_text_color(15, 16, 83)
pdf.cell(45, 5, "CRM & AI Tools:", new_x="RIGHT", new_y="LAST")
pdf.set_font("helvetica", "", 9)
pdf.set_text_color(70, 70, 80)
pdf.cell(0, 5, "HubSpot CRM, OpenAI GPT, n8n Workflows", new_x="LMARGIN", new_y="NEXT")

pdf.set_font("helvetica", "B", 9.5)
pdf.set_text_color(15, 16, 83)
pdf.cell(45, 5, "Agentic Tool Skills:", new_x="RIGHT", new_y="LAST")
pdf.set_font("helvetica", "", 9)
pdf.set_text_color(70, 70, 80)
pdf.cell(0, 5, "Sales Intelligence Team, Recruitment Agent, Data Analyst Agent, Customer Support Agent", new_x="LMARGIN", new_y="NEXT")

pdf.set_font("helvetica", "B", 9.5)
pdf.set_text_color(15, 16, 83)
pdf.cell(45, 5, "Education:", new_x="RIGHT", new_y="LAST")
pdf.set_font("helvetica", "", 9)
pdf.set_text_color(70, 70, 80)
pdf.cell(0, 5, "B.E. Mechanical Engineering", new_x="LMARGIN", new_y="NEXT")

pdf.set_font("helvetica", "B", 9.5)
pdf.set_text_color(15, 16, 83)
pdf.cell(45, 5, "Certifications:", new_x="RIGHT", new_y="LAST")
pdf.set_font("helvetica", "", 9)
pdf.set_text_color(70, 70, 80)
pdf.cell(0, 5, "CISCO Data Analyst, Tableau Fundamentals, HubSpot CRM Certified", new_x="LMARGIN", new_y="NEXT")

pdf.set_font("helvetica", "B", 9.5)
pdf.set_text_color(15, 16, 83)
pdf.cell(45, 5, "Languages:", new_x="RIGHT", new_y="LAST")
pdf.set_font("helvetica", "", 9)
pdf.set_text_color(70, 70, 80)
pdf.cell(0, 5, "English (Professional), Tamil (Native)", new_x="LMARGIN", new_y="NEXT")

# Save PDF
output_path = r"c:\imran-portfolio-laravel\public\resume.pdf"
pdf.output(output_path)
print(f"Resume generated successfully at: {output_path}")
